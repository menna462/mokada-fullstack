@extends('backend.dashboard')
@section('main')
    <div class="mt-10" id="layoutSidenav_content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center mb-3">Details of user <span class="badge badge-primary">{{$users->count()}}</span></h3>

                {{-- أضفنا style="min-width: 1000px;" على div التي تحتوي على الكلاس table-responsive --}}
                <div class="table-responsive" style="min-width: 800px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Password</td>
                                <td>Operation</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$users->id}}</td>
                                <td>{{$users->name}}</td>
                                <td>{{$users->email}}</td>
                                <td>{{$users->password}}</td>
                                <td>
                                    <a href="{{ route('user') }}" class="btn btn-success">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
