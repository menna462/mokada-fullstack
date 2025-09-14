@extends('welcome')
@section('content')
    <section class="favorite-requests-section">
        <div class="section-header">
            <h2>طلباتك <span class="highlight-s1">المفضلة</span></h2>
        </div>

        <div class="container">
            <div class="row g-3 justify-content-center">
                @if ($favoriteOrders->isEmpty())
                    <div class="col-12">
                        <p class="no-favorites-message text-center">لا توجد طلبات في المفضلة بعد.</p>
                    </div>
                @else
                    @foreach ($favoriteOrders as $order)
                        <div class="col-12 col-sm-6 col-lg-3 d-flex justify-content-center">
                            <div class="card h-100">
                                <div class="card-image position-relative">
                                    <div class="heart position-absolute top-0 end-0 p-2">
                                        <a href="#" class="add-to-favorite" data-order-id="{{ $order->id }}"
                                            style="text-decoration: none">
                                            <i class="fas fa-heart text-danger"></i>
                                        </a>
                                    </div>
                                    @if ($order->images->isNotEmpty())
                                        <img class="card-img-top"
                                            src="{{ asset('storage/' . $order->images->first()->image_path) }}"
                                            alt="{{ $order->alternative_item_title ?? $order->item_title }}" />
                                    @else
                                        <img class="card-img-top" src="{{ asset('path/to/default/image.jpg') }}"
                                            alt="صورة غير متوفرة" />
                                    @endif
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $order->order_name ?? 'لا يوجد اسم سلعه' }}</h5>
                                    <p class="card-text">
                                        البديل <i class="fas fa-right-left text-primary"></i> المطلوب
                                    </p>
                                    <h6>{{ $order->alternative_requested ?? 'لا يوجد بديل' }}</h6>
                                    <a href="{{ route('order.details', $order->id) }}" class="btn btn-primary mt-2">
                                        عرض التفاصيل
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
