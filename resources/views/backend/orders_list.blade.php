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
                                    <div class="page-header-icon"><i data-feather="image"></i></div>
                                    جدول الصور
                                </h1>
                                <div class="page-header-subtitle">
                                    قائمة بجميع الصور المرفوعة
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="container-xl px-4 mt-n10">
                <div class="card mb-4">
                    <div class="card-header">
                        جميع الصور المرفوعة
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID الصورة</th>
                                        <th>الصورة</th>
                                        <th>مرتبطة بطلب رقم (العميل)</th>
                                        <th>تاريخ الرفع</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderImages as $image)
                                        <tr>
                                            <td>{{ $image->id }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="صورة الطلب"
                                                    class="img-thumbnail"
                                                    style="width: 100px; height: 100px; object-fit: cover;">
                                            </td>
                                            <td>
                                                @if ($image->order)
                                                    <a href="{{ route('order.show', $image->order->id) }}">
                                                        {{ $image->order->id }} - {{ $image->order->person_name }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">طلب محذوف</span>
                                                @endif
                                            </td>
                                            <td>{{ $image->created_at->format('Y-m-d H:i') }}</td>
                                            <td>
                                                <form action="{{ route('orderimg.destroy', $image->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('هل أنت متأكد من حذف هذه الصورة؟');">
                                                        حذف
                                                    </button>
                                                </form>
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
