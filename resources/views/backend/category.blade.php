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
                                    جدول الفئات
                                </h1>
                                <div class="page-header-subtitle">
                                    قائمة بجميع الفئات المتوفرة
                                </div>
                            </div>
                            <div class="col-auto mt-4">
                                <a class="btn btn-primary" href="{{ route('category.create') }}">
                                    <i class="fa-solid fa-plus me-2"></i>
                                    إنشاء فئة جديدة
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="container-xl px-4 mt-n10">
                <div class="card mb-4">
                    <div class="card-header">
                        جميع الفئات
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatablesSimple" class="table table-bordered" style="white-space: nowrap;"
                                width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>الصورة</th>
                                        <th>الاسم</th>
                                        <th>حالة النشر</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $categoryItem)
                                        <tr>
                                            <td>{{ $categoryItem->id }}</td>
                                            <td>
                                                @php
                                                    $images = json_decode($categoryItem->images, true);
                                                    $image = $images[0] ?? null;
                                                @endphp
                                                @if ($image)
                                                    <img src="{{ asset($image) }}" alt="{{ $categoryItem->name }}"
                                                        style="width: 50px; height: auto;">
                                                @else
                                                    لا توجد صورة
                                                @endif
                                            </td>
                                            <td>{{ $categoryItem->name }}</td>
                                            <td>
                                                <form action="{{ route('category.toggle-publish', $categoryItem) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-sm @if ($categoryItem->is_published) btn-success @else btn-danger @endif">
                                                        @if ($categoryItem->is_published)
                                                            تم النشر
                                                        @else
                                                            لم يتم النشر
                                                        @endif
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('category.edit', $categoryItem) }}"
                                                    class="btn btn-datatable btn-icon btn-transparent-dark me-2">
                                                    <i class="fa-regular fa-edit"></i>
                                                </a>
                                                <form action="{{ route('category.destroy', $categoryItem) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-datatable btn-icon btn-transparent-dark"
                                                        onclick="return confirm('هل أنت متأكد من حذف هذه الفئة؟');">
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
