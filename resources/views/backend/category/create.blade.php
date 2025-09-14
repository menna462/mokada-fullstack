@extends('backend.dashboard')
@section('main')
    <div id="layoutSidenav_content">
        <div class="row">
            <div class="col-md-10 m-auto">
                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group mt-3">
                        <label for="image">Category Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- إضافة حقل "حالة النشر" --}}
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">
                            Published
                        </label>
                    </div>

                    <input type="submit" class="btn btn-success btn-block mt-5" value="Create New Category">
                </form>
            </div>
        </div>
    </div>
@endsection
