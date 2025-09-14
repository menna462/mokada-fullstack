@extends('welcome')
@section('content')
    <div class="container">
        <h2 class="section-title highlight-s1 text-align-center">{{ $category->name }}</h2>

        <div class="row">
            {{-- حلقة التكرار لجميع المنتجات (الـ orders) --}}
            @forelse ($orders as $order)
                <div class="col-lg-4 col-md-6 mb-4"> {{-- استخدمي أعمدة Bootstrap لتنظيم الكروت --}}
                    <div class="card">
                        <div class="card-image">
                            <a href="#" class="heart add-to-favorite" data-order-id="{{ $order->id }}"
                                style="text-decoration: none">
                                <i class="fas fa-heart" style="color: white;"></i>
                            </a>
                            @if ($order->is_featured)
                                <div class="featured-label">مميز</div>
                            @endif
                            @if ($order->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $order->images->first()->image_path) }}"
                                    alt="{{ $order->alternative_item_title ?? $order->item_title }}" />
                            @else
                                <img src="{{ asset('path/to/default/image.jpg') }}" alt="صورة غير متوفرة" />
                            @endif
                        </div>
                        <div class="card-content">
                            <h3>{{ $order->order_name ?? 'لا يوجد اسم سلعه' }}</h3>
                            <p>البديل <i class="fas fa-right-left" style="color: #007bff"></i> المطلوب</p>
                            <h3>{{ $order->alternative_requested ?? 'لا يوجد بديل' }}</h3>
                            <a href="{{ route('order.details', $order->id) }}" class="contact-button">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">لا توجد منتجات في هذا القسم حاليًا.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
