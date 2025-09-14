<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Order;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCategories = Category::where('is_published', true)->get();
        $homeCategories = Category::where('is_published', true)
            ->orderBy('id', 'asc')
            ->take(5)
            ->get();
        $featuredOrders = Order::where('is_featured', true)
            ->where('is_published', true)
            ->with('category', 'images')
            ->get();
        $latestOrders = Order::where('is_featured', false)
            ->where('is_published', true)
            ->with('category', 'images')
            ->get();
        $sessionId = session()->getId();
        $favoriteIds = Favorite::where('session_id', $sessionId)->pluck('order_id');

        $featuredOrders = Order::where('is_featured', true)->get();

        return view('index', compact('homeCategories', 'allCategories', 'featuredOrders', 'latestOrders','featuredOrders', 'favoriteIds'));
    }

    public function showAllCategories()
    {
        // جلب جميع الفئات المنشورة
        $allCategories = Category::where('is_published', true)->get();

        return view('include.sections', compact('allCategories'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
