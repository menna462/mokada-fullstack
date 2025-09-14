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
                                    <div class="page-header-icon"><i data-feather="dollar-sign"></i></div>
                                    جدول العروض
                                </h1>
                                <div class="page-header-subtitle">
                                    قائمة بجميع العروض الترويجية المتوفرة
                                </div>
                            </div>
                            <div class="col-auto mt-4">
                                <a class="btn btn-primary" href="{{ route('deals.create') }}">
                                    <i class="fa-solid fa-plus me-2"></i>
                                    إنشاء عرض جديد
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="container-xl px-4 mt-n10">
                <div class="card mb-4">
                    <div class="card-header">
                        جميع العروض
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatablesSimple" class="table table-bordered" style="white-space: nowrap;"
                                width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>الصورة</th>
                                        <th>العنوان</th>
                                        <th>اللينك</th>
                                        <th>حالة النشر</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deals as $deal)
                                        <tr>
                                            <td>{{ $deal->id }}</td>
                                            <td>
                                                @if ($deal->image_path)
                                                    <img src="{{ asset('storage/' . $deal->image_path) }}" alt="{{ $deal->title }}"
                                                        style="width: 50px; height: auto;">
                                                @else
                                                    لا توجد صورة
                                                @endif
                                            </td>
                                            <td>{{ $deal->title }}</td>
                                            <td><a href="{{ $deal->link }}" target="_blank">{{ Str::limit($deal->link, 30) }}</a></td>
                                            <td>
                                                <form action="{{ route('deals.toggle-publish', $deal) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-sm @if ($deal->is_published) btn-success @else btn-danger @endif">
                                                        @if ($deal->is_published)
                                                            تم النشر
                                                        @else
                                                            لم يتم النشر
                                                        @endif
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('deals.edit', $deal) }}"
                                                    class="btn btn-datatable btn-icon btn-transparent-dark me-2">
                                                    <i class="fa-regular fa-edit"></i>
                                                </a>
                                                <form action="{{ route('deals.destroy', $deal) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-datatable btn-icon btn-transparent-dark"
                                                        onclick="return confirm('هل أنت متأكد من حذف هذا العرض؟');">
                                                        <i class="fa-regular fa-trash-can"></i>
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
