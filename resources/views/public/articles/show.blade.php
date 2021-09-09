@extends('layouts.app')

@php
    $photos =  $article->getAllPhotos();
@endphp

@can('edit', $article)
    @push('admin-controls')
        <a href="{{ route('voyager.articles.edit',['id'=>$article->id]) }}" class="admin-controls__button -edit">
            @lang('voyager::generic.modify')
        </a>
    @endpush
@endcan

@push('header-scripts')
    <script src="{{ mix('js/gallery.js') }}"></script>
@endpush


@section('breadcrumbs')
{{ Breadcrumbs::render('article',$article) }}
@endsection

@section('content')

    <section class="page page-article" itemscope itemtype="http://schema.org/Article">
        <div class="container page-articles__container">
            <div class="page-heading page-card__heading">
                <h1 class="page-title page-card__title" itemprop="headline">{{ $article->getH1() }}</h1>
            </div>
            <meta itemprop="datePublished" content="{{$article->published_at->format(DateTime::ISO8601)}}"/>
            <meta itemprop="dateModified" content="{{$article->updated_at->format(DateTime::ISO8601)}}" />
            <div class="page-card__box page-article__box">
                <div class="page-card__img-wrap">
                    <div class="page-card__img-block page-card__img-block">
                        <img src="{{ $article->getImagePath('image','medium') }}" alt="{{ $article->getH1() }}"
                            class="page-card_img" itemscope itemprop="image" >
                    </div>
                </div>

                <div class="page-card__info page-article__info">
                    <div class="page-card__info-item page-card__info-text tiny-MCE" itemprop="articleBody">
                        {!! $article->body !!}
                    </div>
                    @if ($article->doctor)
                    <p class="page-card__info-text" >
                        @lang('pages.article.author') 
                        <a href="{{ route('doctors.show', ['slug'=>$article->doctor->slug]) }}"
                            class="page-card__autor">
                            <span itemprop="author"> {{ $article->doctor->full_name }} </span>
                            @if ($article->doctor->specializations->count())
                            , {{ $article->doctor->getSpecializationNames() }}.
                            @endif
                        </a>
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="page page-slider">
        <div class="container page-container page-slider__container">
            @if (count($photos))
            <h2 class="page-card__subtitle">@lang('pages.news-stock.photo_gallery')</h2>
            <div class="page-slider__block">
                <div class="page-slider__wrapper">
                    @foreach ($photos as $photo)
                    <div class="page-slider__item gallery__item-1">
                        <a href="{{ Voyager::image( $photo)}}" class="spotlight page-slider__item-link">
                            <img src="{{ Voyager::image($article->getThumbnail($photo,'medium')) }}" alt="{{ $article->getH1() }}" class="page-slider__item-img">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="page-card__add page-new_add">
                <x-share-block class="page-card__add-item page-card__add-repost" :items="setting('socseti.share_socials')" title="{{$article->getH1()}}"> </x-share-block>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
<script>
    var slickOptions = {
        dots: {!! printBool(count($photos) >6) !!},
        arrows: false,
        infinite: false,
        slidesToShow: {!! printInt(count($photos) >=6? 6: count($photos)) !!},
        slidesToScroll: 1,
        responsive: [
            {
            breakpoint: 2000,
                settings: {
                    slidesToShow: {!! printInt(count($photos) >=6? 6: count($photos)) !!},
                    dots: {!! printBool(count($photos) >6) !!},
                }
            },
            {
            breakpoint: 1200,
                settings: {
                    slidesToShow: {!! printInt(count($photos) >=4? 4: count($photos)) !!},
                    dots: {!! printBool(count($photos) >4) !!},
                }
            },
            {
            breakpoint: 600,
                settings: {
                    slidesToShow: {!! printInt(count($photos) >=2? 2: count($photos)) !!},
                    dots: {!! printBool(count($photos) >2) !!},
                }
            },
            
            {
            breakpoint: 480,
                settings: 
                {
                    slidesToShow: 1,
                    dots: {!! printBool(count($photos) >1) !!},
                }
                
            }

        ]
    };
    $(window).on('load', function ()  {
        $('.page-slider__wrapper').slick(slickOptions);
    });

</script>
@endpush

