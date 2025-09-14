<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    // عرض كل الفئات
    public function index()
    {
        $category = Category::all();
        return view('backend.category', compact('category'));
    }

    // عرض فئة معينة
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.show', compact('category'));
    }

    // حذف فئة
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route("category")->with("message", "Deleted successfully");
    }

    // عرض صفحة إنشاء فئة جديدة
    public function create()
    {
        return view("backend.category.create");
    }

    // تخزين فئة جديدة
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_published' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validation للصورة

        ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images/categories'), $imageName);
        $imagePath = 'images/categories/' . $imageName;
    }
        Category::create([
            "name" => $request->name,
            "is_published" => $request->has('is_published'),
        "images" => json_encode([$imagePath]), // تخزين مسار الصورة كمصفوفة JSON

        ]);

        return redirect()->route("category")->with("message", "Created successfully");
    }

    // عرض صفحة تعديل فئة
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit', ["result" => $category]);
    }

    // تحديث فئة
// تحديث فئة
public function update(Request $request)
{
    $old_id = $request->old_id;
    $category = Category::findOrFail(id: $old_id);

    $request->validate([
        'name' => 'required|string|max:255',
        'is_published' => 'nullable|boolean',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validation للصورة
    ]);

    $isPublished = $request->has('is_published');
    $imagePaths = json_decode($category->images, true) ?? [];
    $imagePath = $imagePaths[0] ?? null;

    if ($request->hasFile('image')) {
        // حذف الصورة القديمة إذا كانت موجودة
        if ($imagePath && file_exists(public_path($imagePath))) {
            unlink(public_path($imagePath));
        }

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images/categories'), $imageName);
        $imagePath = 'images/categories/' . $imageName;
    }

    $category->update([
        "name" => $request->name,
        "is_published" => $isPublished,
        "images" => json_encode([$imagePath])
    ]);

    return redirect()->route("category")->with("message", "updated successfully");
}


    public function togglePublish(Request $request, Category $category)
    {
        $category->is_published = !$category->is_published;

        $category->save();

        $message = $category->is_published ? 'Category published successfully' : 'Category unpublished successfully';
        return redirect()->route('category')->with('success', $message);
    }
    public function showOrders($id)
{
    // جلب الكاتجوري لو موجود
    $category = Category::findOrFail($id);

    // جلب الأوردرات الخاصة بالكاتجوري ده
    $orders = Order::where('category_id', $id)
        ->where('is_published', true)
        ->with('images') // لو عندك relation images
        ->get();

    return view('include.category_orders', compact('category', 'orders'));
}

}
