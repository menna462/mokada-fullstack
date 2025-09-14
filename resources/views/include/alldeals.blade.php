@extends('welcome')
@section('content')
<div class="container">
<div class="gallery-row d-flex flex-wrap">
@foreach($allDeals as $deal)
<div class="gallery-column col-md-6">
<div class="deal-card" style="background-image: url('{{ asset($deal->image_path) }}');">
<div class="deal-content">
<h3>{{ $deal->title }}</h3>
<a href="{{ $deal->link }}" class="btn btn-deal">
    <span class="tit-alan"> تصفح الاعلان</span>
    <span class="icon-box">AB</span>
</a>
</div>
</div>
</div>
@endforeach
</div>
</div>
@endsection
