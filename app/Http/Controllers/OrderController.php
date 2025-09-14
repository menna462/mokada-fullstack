<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderImage;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * عرض قائمة بجميع الطلبات مقسمة حسب الحالة.
     */
    public function index()
    {
        $pendingOrders = Order::where('is_published', false)->where('is_rejected', false)->with('category', 'images')->get();
        $acceptedOrders = Order::where('is_published', true)->with('category', 'images')->get();
        $rejectedOrders = Order::where('is_rejected', true)->with('category', 'images')->get();

        return view('backend.order', compact('pendingOrders', 'acceptedOrders', 'rejectedOrders'));
    }

    /**
     * عرض نموذج إنشاء طلب جديد.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.order.create', compact('categories'));
    }

    /**
     * تخزين طلب جديد.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'person_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'whatsapp_number' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:255',
            'item_amount' => 'required|numeric',
            'order_name' => 'required|string|max:255',
            'alternative_requested' => 'nullable|string|max:255',
            'alternative_item_title' => 'nullable|string|max:255',
            'item_specifications' => 'nullable|string',
            'notes' => 'nullable|string',
            'cart_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $itemAmount = $validatedData['item_amount'];

        if ($itemAmount >= 0 && $itemAmount <= 4000) {
            $orderType = 'صغير';
        } elseif ($itemAmount > 4000 && $itemAmount <= 10000) {
            $orderType = 'متوسط';
        } else {
            $orderType = 'كبير';
        }
        $validatedData['order_type'] = $orderType;
        $validatedData['is_published'] = false;
        $validatedData['is_rejected'] = false;
        $validatedData['is_featured'] = false; // إضافة قيمة افتراضية

        $order = Order::create($validatedData);

    if ($request->hasFile('cart_images')) {
        $uploadDirectory = 'images/orders';
        if (!file_exists(public_path($uploadDirectory))) {
            mkdir(public_path($uploadDirectory), 0777, true);
        }

        foreach ($request->file('cart_images') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path($uploadDirectory), $imageName);
            $imagePath = $uploadDirectory . '/' . $imageName;

            $order->images()->create([
                'image_path' => $imagePath
            ]);
        }
    }

        return redirect()->route('home')->with('success', 'تم إرسال طلبك بنجاح، سيتم مراجعته قريبًا!');
    }

    public function show(string $id)
    {
        $orders = Order::findOrFail($id);
        $orders->load('images');
        return view('backend.order.show', compact('orders'));
    }

        public function orderDetails(Order $order)
    {

        return view('include.description', compact('order'));
    }
    public function edit(Order $order)
    {
        $categories = Category::all();
        return view('backend.order.edit', compact('order', 'categories'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'person_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'whatsapp_number' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:255',
            'order_name' => 'required|string|max:255',
            'item_amount' => 'required|numeric',
            'alternative_requested' => 'nullable|string|max:255',
            'alternative_item_title' => 'nullable|string|max:255',
            'item_specifications' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        // لا نحتاج للتحقق من is_published أو is_rejected هنا
        $order->update($request->all());

        return redirect()->route('order')->with('success', 'تم تحديث الطلب بنجاح!');
    }

    public function destroy(Order $order)
    {
        foreach ($order->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }
        $order->delete();
        return redirect()->route('order')->with('success', 'تم حذف الطلب بنجاح!');
    }

    public function pending()
    {
        $orders = Order::where('is_published', false)
            ->where('is_rejected', false)
            ->with('category', 'images')
            ->get();

        return view('backend.orders.pending', compact('orders'));
    }

    /**
     * عرض الطلبات المقبولة فقط.
     */
    public function accepted()
    {
        $acceptedOrders = Order::where('is_published', true)
            ->with('category', 'images')
            ->get();

        return view('backend.accepted', compact('acceptedOrders'));
    }

    /**
     * عرض الطلبات المرفوضة فقط.
     */
    public function rejected()
    {
        $rejectedOrders = Order::where('is_rejected', true)
            ->with('category', 'images')
            ->get();

        return view('backend.requests', compact('rejectedOrders'));
    }

    /**
     * قبول الطلب.
     */
    public function acceptOrder(Order $order)
    {
        $order->is_published = true;
        $order->is_rejected = false;
        $order->save();
        return back()->with('success', 'تم قبول الطلب بنجاح.');
    }

    /**
     * رفض الطلب.
     */
    public function rejectOrder(Order $order)
    {
        $order->is_published = false;
        $order->is_rejected = true;
        $order->save();
        return back()->with('success', 'تم رفض الطلب بنجاح.');
    }

    /**
 * تمييز الطلب.
 */
public function distinguish(Order $order)
{
    // تحقق من أن الطلب مقبول قبل تمييزه
    if ($order->is_published) {
        $order->is_featured = true;
        $order->save();
        return back()->with('success', 'تم تمييز الطلب بنجاح.');
    }

    return back()->with('error', 'لا يمكن تمييز طلب غير مقبول.');
}

/**
 * إلغاء تمييز الطلب.
 */
public function undistinguish(Order $order)
{
    $order->is_featured = false;
    $order->save();
    return back()->with('success', 'تم إلغاء تمييز الطلب بنجاح.');
}

    /**
     * عرض الطلبات المميزة فقط.
     */
    public function featured()
    {
        $featuredOrders = Order::where('is_featured', true)
            ->where('is_published', true) // تأكد أن الطلب مقبول ومميز
            ->with('category', 'images')
            ->get();

        return view('index', compact('featuredOrders'));
    }

    /**
     * عرض الطلبات غير المميزة فقط.
     */
    public function notFeatured()
    {
        $notFeaturedOrders = Order::where('is_featured', false)
            ->where('is_published', true) // تأكد أن الطلب مقبول وغير مميز
            ->with('category', 'images')
            ->get();

        return view('index', compact('notFeaturedOrders'));
    }
public function search(Request $request)
{
    $query = $request->get('query');

    $orders = Order::where('order_name', 'like', '%' . $query . '%')
        ->select('id', 'order_name')
        ->limit(10)
        ->get();

    return response()->json($orders);
}


}
