<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderImageController extends Controller
{
    /**
     * عرض قائمة بجميع الصور المرفوعة.
     */
    public function index()
    {
        // جلب جميع الصور من قاعدة البيانات
        $orderImages = OrderImage::with('order')->latest()->paginate(10);
        return view('backend.orders_list', compact('orderImages'));
    }

    
}
