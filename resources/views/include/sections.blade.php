@extends('welcome')
@section('content')
  <section class="categories-section">
        <h2 class="section-title highlight-s1">الأقسام</h2>
        <div class="categories-grid">
            @foreach ($allCategories as $categoryItem)
                <div class="category-card">
                    <a href="{{ route('categories.orders', $categoryItem->id) }}">
                        <div class="card-icon-wrapper">
                            {{-- جلب أول صورة من مصفوفة الصور --}}
                            @php
                                $images = json_decode($categoryItem->images, true);
                                $image = $images[0] ?? 'frontend/image/placeholder.png';
                            @endphp
                            <img src="{{ asset($image) }}" alt="{{ $categoryItem->name }}" />
                        </div>
                        <span class="card-text">{{ $categoryItem->name }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
