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
                                    <div class="page-header-icon"><i data-feather="users"></i></div>
                                    جدول المستخدمين
                                </h1>
                                <div class="page-header-subtitle">
                                    قائمة بجميع المستخدمين
                                </div>
                            </div>
                            <div class="col-auto mt-4">
                                <a class="btn btn-primary" href="{{route("users.create")}}">
                                    <i class="fa-solid fa-plus me-2"></i>
                                    إنشاء مستخدم جديد
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="container-xl px-4 mt-n10">
                <div class="card mb-4">
                    <div class="card-header">
                        جميع المستخدمين
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatablesSimple" class="table table-bordered" style="white-space: nowrap;"
                                width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>الاسم</th>
                                        <th>الإيميل</th>
                                        <th>دور المستخدم</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- تأكد من تمرير متغير 'users' من الـ Controller --}}
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                <a href="{{ route('users.show', $user->id) }}"
                                                    class="btn btn-datatable btn-icon btn-transparent-dark me-2">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-datatable btn-icon btn-transparent-dark me-2">
                                                    <i class="fa-regular fa-edit"></i>
                                                </a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-datatable btn-icon btn-transparent-dark"
                                                        onclick="return confirm('هل أنت متأكد من حذف هذا المستخدم؟');">
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
