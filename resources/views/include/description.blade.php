@extends('welcome')
@section('content')
<div class="py-4" style="background-color: #F5F5F5;">
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <h1 class="text-center product-title"><i class="fas fa-arrow-right mt-2"></i> تفاصيل السلعة</h1>
            <div class="col-12 col-lg-10">
                <div class="product-media-section mb-4">
                    {{-- عرض الصورة الرئيسية من خلال العلاقة --}}
                  <div class="main-image-container mb-3">
                        @if ($order->images->isNotEmpty())
                            <img id="main-product-image"
                                src="{{ asset($order->images->first()->image_path) }}"
                                class="img-fluid rounded-3 shadow-sm"
                                alt="{{ $order->order_name ?? 'السلعة الرئيسية' }}" />
                        @else
                            <img id="main-product-image" src="{{ asset('images/placeholder.png') }}"
                                class="img-fluid rounded-3 shadow-sm" alt="صورة غير متوفرة" />
                        @endif
                    </div>


                    {{-- عرض الصور المصغرة في السلايدر --}}
                    <div class="thumbnails-container-wrapper">
                        <div class="swiper product-thumbnails-swiper">
                            <div class="swiper-wrapper">
                                @foreach ($order->images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($image->image_path) }}"
                                            alt="صورة مصغرة"
                                            class="thumbnail-item rounded-3 img-fluid"
                                            data-src="{{ asset($image->image_path) }}" />
                                    </div>
                                @endforeach
                            </div>

                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>

                <div class="row down-swiper">
                    <div class="col-12 col-md-6">
                        <div class="curd">
                            <p class="product-owner">{{ $order->person_name ?? 'لا يوجد اسم' }}</p>
                            <p class="product-name">{{ $order->order_name ?? 'لا يوجد اسم' }}</p>
                            <p class="pr my-4"><span>وصف السلعة:</span>{{ $order->item_specifications ?? 'لا يوجد وصف' }}</p>
                            <div class="d-flex adress">
                                <p class="pr-1">عنوان السلعة:</p>
                                <p>{{ $order->address ?? 'لا يوجد عنوان' }}</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 mt-2">
                            <a href="https://wa.me/{{ $order->whatsapp_number ?? '' }}" class="flex-fill btn contact-btn whatsapp-btn">
                                <img src="{{ asset('frontend/image/logos_whatsapp-icon.png') }}" alt="WhatsApp Icon">
                                <span>{{ $order->whatsapp_number ?? 'رقم غير متوفر' }}</span>
                            </a>
                            <a href="tel:{{ $order->number ?? '' }}" class="flex-fill btn contact-btn phone-btn">
                                <i class="fa-solid fa-phone-flip"></i>
                                <span>{{ $order->number ?? 'رقم غير متوفر' }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 ">
                        <div class="curd">
                            <p class="product-owner">السلعة البديلة</p>
                            <h4 class="product-name">{{ $order->alternative_requested ?? 'لا يوجد بديل' }}</h4>
                            <div class="d-flex adress my-4" style="  " >
                                <p class="pr-1"> عنوان البديل:</p>
                                <p>{{ $order->alternative_item_title ?? 'لا يوجد عنوان' }}</p>
                            </div>
                            <p class="pr"><span>تفاصيل اخرى:</span>{{ $order->item_specifications ?? 'لا يوجد تفاصيل' }}</p>
                        </div>
                        <div class="d-grid gap-2 ">
                            <a href="https://wa.me/{{ $order->admin_whatsapp_number ?? '' }}" class="btn contact-btn whatsapp-btn">
                                <img src="{{ asset('frontend/image/logos_whatsapp-icon.png') }}" alt="WhatsApp Icon">
                                <span>التواصل مع الادارة</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
