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
                                    <div class="page-header-icon"><i data-feather="eye"></i></div>
                                    تفاصيل الطلب
                                </h1>
                                <div class="page-header-subtitle">
                                    عرض تفاصيل الطلب رقم {{ $orders->id }}
                                </div>
                            </div>
                            <div class="col-auto mt-4">
                                <a class="btn btn-primary" href="{{ route('order') }}">
                                    <i class="fa-solid fa-arrow-left me-2"></i>
                                    العودة إلى قائمة الطلبات
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="container-xl px-4 mt-n10" style="direction: rtl;">
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <i class="fas fa-info-circle me-2"></i> بيانات الطلب الأساسية
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <strong>الاسم:</strong> {{ $orders->person_name }}
                                    </li>

                                    <li class="list-group-item">
                                        <strong>رقم واتساب:</strong> {{ $orders->number ?? 'غير متوفر' }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>رقم واتساب:</strong> {{ $orders->whatsapp_number ?? 'غير متوفر' }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>العنوان:</strong> {{ $orders->address }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>الفئة:</strong> {{ $orders->category->name ?? 'لا توجد فئة' }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>مبلغ السلعة:</strong> ${{ number_format($orders->item_amount, 2) }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <i class="fas fa-box me-2"></i> تفاصيل السلعة والملاحظات
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <strong>اسم السلعه:</strong> {{ $orders->order_name }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>البديل المطلوب:</strong> {{ $orders->alternative_requested ?? 'لا يوجد' }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>عنوان السلعة البديلة:</strong> {{ $orders->alternative_item_title ?? 'لا يوجد' }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>مواصفات السلعة:</strong>
                                        <p class="mb-0">{{ $orders->item_specifications ?? 'لا يوجد' }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>ملاحظات:</strong>
                                        <p class="mb-0">{{ $orders->notes ?? 'لا يوجد' }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-image me-2"></i> صور الطلب
                    </div>
                    <div class="card-body">
                        @if ($orders->images->isNotEmpty())
                            <div class="row gx-4">
                                @foreach ($orders->images as $image)
                                    <div class="col-md-3 mb-3">
                                        <div class="card h-100">
                                            <a href="{{ asset('storage/' . $image->image_path) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Order Image" class="card-img-top img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="col-12 text-center text-muted">
                                لا توجد صور لهذا الطلب.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
