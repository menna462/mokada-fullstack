@extends('backend.dashboard')
@section('main')
    <div class="" id="layoutSidenav_content">
        <div class="row">
            <div class="col-md-10 m-auto">
                <form action="{{ route('category.update') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="old_id" value="{{ $result->id }}">

                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $result->name) }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    {{-- حقل رفع الصورة --}}
                    <div class="form-group mt-3">
                        <label for="image">Category Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- عرض الصورة الحالية --}}
                    @php
                        $images = json_decode($result->images, true);
                        $imagePath = $images[0] ?? null;
                    @endphp
                    @if ($imagePath)
                        <div class="current-image-preview mt-3">
                            <label>Current Image</label>
                            <img src="{{ asset($imagePath) }}" alt="Current Category Image" style="max-width: 150px; display: block; margin-top: 10px;">
                        </div>
                    @endif


                    {{-- إضافة حقل "حالة النشر" --}}
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $result->is_published) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">
                            Published
                        </label>
                    </div>

                    <input type="submit" class="btn btn-success btn-block mt-4" value="Update Category">
                </form>
            </div>
        </div>
    </div>
@endsection
