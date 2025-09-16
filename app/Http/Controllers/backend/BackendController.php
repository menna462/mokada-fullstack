<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // جلب أعداد الطلبات
        $totalOrdersCount = Order::count();
        $acceptedOrdersCount = Order::where('is_published', true)->count();
        $rejectedOrdersCount = Order::where('is_rejected', true)->count();

        // إرسال المتغيرات إلى ملف الـ view
        return view('backend.include.body', compact('totalOrdersCount', 'acceptedOrdersCount', 'rejectedOrdersCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
