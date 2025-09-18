@extends('welcome')
@section('content')
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src={{ asset('frontend/image/img-gradient.png') }} alt="صورة سيارة فاخرة" />
                <div class="slide-content">
                    <div class="logo-img w-50">
                        <img src={{ asset('frontend/image/Group(8).png') }} alt="logo" />
                        <h3>مقايضة</h3>
                    </div>
                    <p>خذ ما تحتاج.. واعطي ما لا تحتاج..</p>
                    <a href="#" class="call-to-action-button">
                        طلب مقايضة <span class="arrow-icon"><i class="fa-solid fa-arrow-left"></i>
                        </span>
                    </a>
                </div>
            </div>

            <div class="swiper-slide">
                <img src={{ asset('frontend/image/back2.png') }} alt="صورة سيارة فاخرة" />
                <div class="slide-content">
                    <div class="logo-img w-50">
                        <img src={{ asset('frontend/image/Group(8).png') }} alt="logo" />
                        <h3>مقايضة</h3>
                    </div>
                    <p>خذ ما تحتاج.. واعطي ما لا تحتاج..</p>
                    <a href="#" class="call-to-action-button">
                        طلب مقايضة <span class="arrow-icon"><i class="fa-solid fa-arrow-left"></i>
                        </span>
                    </a>
                </div>
            </div>

            <div class="swiper-slide">
                <img src={{ asset('frontend/image/back3.png') }} alt="صورة سيارة فاخرة" />
                <div class="slide-content">
                    <div class="logo-img w-50">
                        <img src={{ asset('frontend/image/Group(8).png') }} alt="logo" />
                        <h3>مقايضة</h3>
                    </div>
                    <p>خذ ما تحتاج.. واعطي ما لا تحتاج..</p>
                    <a href="#" class="call-to-action-button">
                        طلب مقايضة <span class="arrow-icon"><i class="fa-solid fa-arrow-left"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="swiper-slide">
                <img src={{ asset('frontend/image/back4.png') }} alt="صورة سيارة فاخرة" />
                <div class="slide-content">
                    <div class="logo-img w-50">
                        <img src={{ asset('frontend/image/Group(8).png') }} alt="logo" />
                        <h3>مقايضة</h3>
                    </div>
                    <p>خذ ما تحتاج.. واعطي ما لا تحتاج..</p>
                    <a href="#" class="call-to-action-button">
                        طلب مقايضة <span class="arrow-icon"><i class="fa-solid fa-arrow-left"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <!-- three srction -->
    <section class="section-container section-three">
        <div class="aksam">
            <h1>الأقسام</h1>
        </div>
        <div class="allcard">
            @foreach ($homeCategories as $categoryItem)
                <div class="category-wrapper">
                    <a href="{{ route('categories.orders', $categoryItem->id) }}">
                        <div class="section-item">
                            <div class="section-icon">

                                @php
                                    $images = json_decode($categoryItem->images, true);
                                    $image = $images[0] ?? 'frontend/image/placeholder.png';
                                @endphp
                                <img src="{{ asset($image) }}" alt="{{ $categoryItem->name }}" />
                            </div>
                        </div>
                        <p>{{ $categoryItem->name }}</p>
                    </a>
                </div>
            @endforeach

            {{-- زر عرض الكل يظل خارج الـ loop --}}
            <div class="category-wrapper">
                <div class="section-item icones">
                    <a href="{{ route('sections.index') }}">
                        <div class="section-icon">
                            <i class="fas fa-arrow-left"></i>
                        </div>
                    </a>
                </div>
                <p>عرض الكل</p>
            </div>
        </div>
    </section>



    {{-- foor one --}}
    <section class="featured-requests-section">
        <div class="section-header">
            <h2>طلبات <span class="highlight-s1">المقايضة</span> المميزة</h2>
            <a href="#" class="view-all-button">عرض الكل <i class="fa-solid fa-arrow-left"></i></a>
        </div>

        <div class="requests-swiper-container">
            <div class="swiper requests-swiper">
                <div class="swiper-wrapper all-slider">
                    @foreach ($featuredOrders as $order)
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-image">
                                    <a href="#" class="heart add-to-favorite" data-order-id="{{ $order->id }}"
                                        style="text-decoration: none">
                                        <i class="fas fa-heart"
                                            style="color: {{ $favoriteIds->contains($order->id) ? 'red' : 'white' }};"></i>
                                    </a>
                                    <div class="featured-label">مميز</div>
                                    @if ($order->images->isNotEmpty())
                                        <img src="{{ asset($order->images->first()->image_path) }}"
                                            alt="{{ $order->alternative_item_title ?? $order->item_title }}" />
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" alt="صورة غير متوفرة" />
                                    @endif
                                </div>
                                <div class="card-content">
                                    <h3>{{ $order->order_name ?? 'لا يوجد اسم سلعه' }}</h3>
                                    <p>البديل <i class="fas fa-right-left" style="color: #007bff"></i> المطلوب</p>
                                    <h3>{{ $order->alternative_requested ?? 'لا يوجد بديل' }}</h3>
                                    <a href="{{ route('order.details', $order->id) }}" class="contact-button">عرض
                                        التفاصيل</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="requests-button-prev">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="requests-button-next">
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
    </section>
    <!-- foor tow -->
    <section class="featured-offers-section mb-5">
        <div class="section-header">
            <h2>أخر <span class="highlight">طلبات</span> المقايضة</h2>
            <a href="#" class="view-all-button">عرض كل  <i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="offers-swiper-container">
            <div class="swiper offers-swiper">
                <div class="swiper-wrapper offers-slider">
                    @foreach ($latestOrders as $order)
                        {{-- كود الكارت هنا، لكن بدون الـ "featured-label" --}}
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-image">
                                    <a href="#" class="heart add-to-favorite" data-order-id="{{ $order->id }}"
                                        style="text-decoration: none">
                                        <i class="fas fa-heart"
                                            style="color: {{ $favoriteIds->contains($order->id) ? 'red' : 'white' }};"></i>
                                    </a>
                                    @if ($order->images->isNotEmpty())
                                        <img src="{{ asset($order->images->first()->image_path) }}" alt="Order Image" />
                                    @endif
                                </div>
                                <div class="card-content">
                                    <h3>{{ $order->order_name ?? 'لا يوجد' }}</h3>
                                    <p>
                                        البديل <i class="fas fa-right-left" style="color: #007bff"></i> المطلوب
                                    </p>
                                    <h3>{{ $order->alternative_requested ?? 'لا يوجد' }}</h3>
                                    <a href="{{ route('order.details', $order->id) }}" class="contact-button">عرض
                                        التفاصيل</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- أزرار التنقل -->
            <div class="offers-button-prev">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="offers-button-next">
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
    </section>

    <!-- five section -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="request-right">
                    <h2>طلب مقايضة <span class="highlight-form">جديدة</span></h2>

                    <button type="button" class="btn btn-primary d-md-none form-toggle-btn" data-bs-toggle="modal"
                        data-bs-target="#formModal">
                        قدم طلبك الآن
                    </button>

                    <div class="request-form d-none d-md-flex">
                        <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-columns">
                                <div class="form-column">
                                    <div class="form-group">
                                        <input type="text" id="person_name" name="person_name" required
                                            placeholder="الاسم" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="address" name="address" required
                                            placeholder="العنوان" />
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" id="number" name="number" required
                                            placeholder="رقم الموبايل" />
                                    </div>
                                    <div class="form-group">
                                        <input type="tel"id="whatsapp_number" name="whatsapp_number"
                                            placeholder="رقم الموبايل الواتساب" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="order_name" name="order_name" required
                                            placeholder="اسم السالعة" />
                                    </div>
                                    <div class="image-upload-container">
                                        <input type="file" id="cart_images" name="cart_images[]" multiple
                                            accept="image/*" class="d-none">
                                        <label for="cart_images" class="image-upload-label">
                                            <svg class="upload-icon" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12">
                                                </path>
                                            </svg>
                                            <span class="upload-text">رفع صور السلعة</span>
                                        </label>
                                        <div id="file-names-display" class="file-names-display"></div>
                                    </div>
                                </div>
                                <div class="form-column">
                                    <div class="form-group">
                                        <textarea id="item_specifications" name="item_specifications" rows="1" placeholder="وصف السلعة"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" step="0.01" id="item_amount" name="item_amount"
                                            required placeholder="مبلغ السلعه" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="alternative_requested" name="alternative_requested"
                                            required placeholder=" البديلا لمطلوب" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="alternative_item_title" name="alternative_item_title"
                                            required placeholder="عنوان البديل المطلوب " />
                                    </div>
                                    <div class="form-group">
                                        <select name="category_id" id="category_id" required>
                                            <option value="">اختر الفئة</option>
                                            @foreach ($allCategories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="notes" name="notes" rows="4" placeholder=" تفاصيل أخري "></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit">قدم طلبك الآن</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formModalLabel">طلب مقايضة جديدة</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body request-form">
                            <form id="mobileForm" action="{{ route('order.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-columns">
                                    <div class="form-column">
                                        <div class="form-group">
                                            <input type="text" name="person_name" required placeholder="الاسم" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="address" required placeholder="العنوان" />
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" name="number" required placeholder="رقم الموبايل" />
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" name="whatsapp_number"
                                                placeholder="رقم الموبايل الواتساب" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="order_name" required placeholder="اسم السالعة" />
                                        </div>
                                        <div class="image-upload-container">
                                            <input type="file" id="cart_images_modal" name="cart_images[]" multiple
                                                accept="image/*" class="d-none">
                                            <label for="cart_images_modal" class="image-upload-label">
                                                <svg class="upload-icon" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12">
                                                    </path>
                                                </svg>
                                                <span class="upload-text">رفع صور السلعة</span>
                                            </label>
                                            <div id="file-names-display-modal" class="file-names-display"></div>
                                        </div>
                                    </div>
                                    <div class="form-column">
                                        <div class="form-group">
                                            <textarea name="item_specifications" rows="1" placeholder="وصف السلعة"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" step="0.01" name="item_amount" required
                                                placeholder="مبلغ السلعه" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="alternative_requested" required
                                                placeholder=" البديلا لمطلوب" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="alternative_item_title" required
                                                placeholder="عنوان البديل المطلوب " />
                                        </div>
                                        <div class="form-group">
                                            <select name="category_id" required>
                                                <option value="">اختر الفئة</option>
                                                @foreach ($allCategories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="notes" rows="4" placeholder=" تفاصيل أخري "></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit">قدم طلبك الآن</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 socielleft">
                <div class="contact-info">
                    <h3>تواصل معنا</h3>
                    <div class="contact-items-container contact-numbers">
                        <div class="contact-item">
                            <a href="tel:+96666201248" class="icon-link">
                                <div class="icon-bg">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                            </a>
                            <a href="tel:+96666201248" class="number-link">
                                <p class="number-text">+96666201248</p>
                            </a>
                        </div>
                        <div class="contact-item">
                            <a href="tel:+96666467891" class="icon-link">
                                <div class="icon-bg">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                            </a>
                            <a href="tel:+96666467891" class="number-link">
                                <p class="number-text">+96666467891</p>
                            </a>
                        </div>

                    </div>
                    <div class="social-icons">
                        <a href="#">
                            <div class="icon-bg">
                                <i class="fab fa-tiktok"></i>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon-bg">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon-bg">
                                <i class="fab fa-instagram"></i>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon-bg">
                                <i class="fab fa-snapchat-ghost"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- six -->
    <div class="container">
        <div class="gallery-row d-flex flex-wrap">
            @foreach ($deals as $deal)
                <div class="gallery-column col-md-6">
                    <div class="deal-card" style="background-image: url('{{ asset($deal->image_path) }}');">
                        <div class="deal-content">
                            <h3>{{ $deal->title }}</h3>
                            <a href="{{ $deal->link }}" class="btn btn-deal">
                                <span class="tit-alan"> تصفح الاعلان</span>
                                <span class="icon-box">AB</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="{{ route('all.deals') }}" class="btn btn-primary px-4 py-2">
                عرض الكل
            </a>
        </div>
    </div>
@endsection
