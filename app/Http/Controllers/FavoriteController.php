<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Favorite; // تأكد من إنشاء هذا الموديل

class FavoriteController extends Controller
{
    public function toggleFavorite(Order $order, Request $request)
    {
        $sessionId = $request->session()->getId();

        $favorite = Favorite::where('session_id', $sessionId)
            ->where('order_id', $order->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            $message = 'تم حذف الطلب من المفضلة.';
            $isFavorite = false;
        } else {
            Favorite::create([
                'session_id' => $sessionId,
                'order_id' => $order->id,
            ]);
            $message = 'تم إضافة الطلب إلى المفضلة.';
            $isFavorite = true;
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'is_favorite' => $isFavorite
        ]);
    }

    public function showFavorites(Request $request)
    {
        $sessionId = $request->session()->getId();

        // جلب الطلبات المفضلة من خلال جدول favorites
        $favoriteOrders = Favorite::where('session_id', $sessionId)
            ->with('order')
            ->get()
            ->pluck('order');

        return view('include.favorites', compact('favoriteOrders'));
    }
    public function getFavoritesCount(Request $request)
    {
        $sessionId = $request->session()->getId();
        $count = Favorite::where('session_id', $sessionId)->count();

        return response()->json(['count' => $count]);
    }
}
