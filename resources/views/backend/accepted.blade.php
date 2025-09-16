@extends('backend.dashboard')

@section('main')
    <div id="layoutSidenav_content">
        <main>
            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container-xl px-4">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-4">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="filter"></i></div>
                                    جدول الطلبات
                                </h1>
                                <div class="page-header-subtitle">
                                    جميع الطلبات المقبوله
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="container-xl px-4 mt-n10">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-check-circle me-2"></i> الطلبات المقبولة
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatablesSimple" class="table table-bordered" style="white-space: nowrap;"
                                width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>اسم الشخص</th>
                                        <th>اسم السلعه</th>
                                        <th>العنوان</th>
                                        <th>رقم واتساب</th>
                                        <th>الفئة</th>
                                        <th>مبلغ السلعة</th>
                                        <th>نوع الطلب</th>
                                        <th>البديل المطلوب</th>
                                        <th>عنوان البديل</th>
                                        <th>مواصفات السلعة</th>
                                        <th>ملاحظات</th>
                                        <th>صور</th>
                                        <th>تمييز</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($acceptedOrders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->person_name }}</td>
                                            <td>{{ $order->order_name }}</td>
                                            <td>{{ $order->address }}</td>
                                            <td>{{ $order->whatsapp_number }}</td>
                                            <td>{{ $order->category->name ?? 'لا توجد فئة' }}</td>
                                            <td>${{ number_format($order->item_amount, 2) }}</td>
                                            <td>{{ $order->order_type }}</td>
                                            <td>{{ $order->alternative_requested ?? 'لا يوجد' }}</td>
                                            <td>{{ $order->alternative_item_title ?? 'لا يوجد' }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($order->item_specifications ?? 'لا يوجد', 60, '...') }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($order->notes ?? 'لا يوجد', 60, '...') }}</td>
                                             <td>
                                                @if ($order->images->isNotEmpty())
                                                    <img src="{{ asset($order->images->first()->image_path) }}"
                                                        alt="Order Image" width="50">
                                                @else
                                                    <span>لا توجد</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if ($order->is_featured)
                                                    <a href="{{ route('order.undistinguish', $order->id) }}"
                                                        class="btn btn-warning btn-sm" title="إلغاء التمييز">
                                                        <i class="fa-solid fa-star"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('order.distinguish', $order->id) }}"
                                                        class="btn btn-outline-warning btn-sm" title="تمييز الطلب">
                                                        <i class="fa-regular fa-star"></i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('order.show', $order->id) }}"
                                                    class="btn btn-datatable btn-icon btn-transparent-dark me-2">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{ route('order.reject', $order->id) }}"
                                                    class="btn btn-danger">رفض</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
