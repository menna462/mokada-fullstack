@extends('backend.dashboard')

@section('main')

<div id="layoutSidenav_content">
<div class="row">
<div class="col-md-10 m-auto">
<form action="{{ route('deals.store') }}" method="post" enctype="multipart/form-data">
@csrf
<label for="title">عنوان العرض</label>
<input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
@error('title')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

            <div class="form-group mt-3">
                <label for="link">رابط العرض</label>
                <input type="text" class="form-control" name="link" id="link" value="{{ old('link') }}">
                @error('link')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="image">صورة العرض</label>
                <input type="file" class="form-control" name="image" id="image">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">
                    تم النشر
                </label>
            </div>

            <input type="submit" class="btn btn-success btn-block mt-5" value="إنشاء عرض جديد">
        </form>
    </div>
</div>

</div>

@endsection
