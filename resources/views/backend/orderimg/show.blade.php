@extends('backend.dashboard')

@section('main')
    <div class="container mt-4">
        <h2>صور الطلب رقم: {{ $order->id }}</h2>
        <a href="{{ route('order') }}" class="btn btn-secondary mb-3">العودة إلى الطلبات</a>

        <div class="row">
            @forelse ($images as $image)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $image->image_path) }}"
                             class="card-img-top"
                             alt="صورة الطلب"
                             style="height: 300px; object-fit: cover;">
                        <div class="card-body text-center">
                            <form action="{{ route('orderimg.destroy', $image->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد؟')">
                                    حذف الصورة
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning">لا توجد صور لهذا الطلب.</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
