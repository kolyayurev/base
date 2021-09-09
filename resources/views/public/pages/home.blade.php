@extends('layouts.page')

@php
    $animationDuration = 1000;
@endphp

@section('body-class','home-page')

@section('content')
<section class="home-main " >
    <div class="home-main__wrapper container">
        <div class="home-main__content" data-aos="fade" data-aos-duration="{{$animationDuration}}">
            <h1 class="home-main__title">{{ $page->getH1() }}</h1>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        AOS.init({
            once:true,
            offset:100,
        });
    });
</script>
@endpush
