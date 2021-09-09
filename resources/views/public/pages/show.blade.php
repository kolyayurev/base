@extends('layouts.page')

@push('style')
@endpush


@section('content')

    <section class="wrapper page">
        <div class=" page__container">
            <h1 class="page__title">{{ $page->getH1() }}</h1>

            <div class="page-card__box">
                @if ($page->image_path)
                <div class="page-card__img-wrap">
                    <div class="page-card__img-block page-serv__img-block">
                        <img src="{{ $page->getImagePath('image','medium') }}" alt="{{ $page->getH1() }}" class="page-card_img">
                    </div>
                </div>
                @endif
                <div class="page-card__info page-doc__info">
                    <div class="page-card__info-item page-card__info-text tiny-MCE">
                        {!! $page->body !!}
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection