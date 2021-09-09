@extends('layouts.app')

@can('browse', app(App\Models\Article::class))
    @push('admin-controls')
        <a href="{{ route('voyager.articles.index') }}" class="admin-controls__button -edit">
            @lang('voyager::generic.browse')
        </a>
    @endpush
@endcan

@section('breadcrumbs')
{{ Breadcrumbs::render('articles') }}
@endsection


@section('content')

<section class="page page-articles">
    <div class="container page-container">

        <div class="page-heading">
            <h1 class="page-title page-card__title">@lang('pages.articles.title')</h1>
        </div>
        @if($articles->count())
        <div class="page-catalog page-articles__box">
            @foreach ($articles as $article)
            <div class="page-catalog__item page-articles__item">
                <a href="{{route('articles.show',['slug'=>$article->slug])}}" class="page-catalog__img-block page-articles__img-block">
                    <img src="{{ $article->getImagePath('image','medium') }}" alt="{{ $article->name }}"
                        class="page-catalog__img page-articles__img">
                </a>
                <a href="{{route('articles.show',['slug'=>$article->slug])}}" class="page-catalog__info page-articles__info">
                    <h3 class="page-catalog__item-title page-articles__item-title">{{ $article->name }}</h3>
                    <p class="page-catalog__item-text page-articles-text">{{ $article->excerpt }}</p>
                </a>
                <div class="page-catalog__buttons page-articles__buttons">
                    <a href="{{route('articles.show',['slug'=>$article->slug])}}" class="btn btn-arrow btn-page-articles">@lang('common.buttons.more')</a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="page-catalog__empty-block">
            <h3 class="page-catalog__empty-title">@lang('pages.articles.empty')</h3>
        </div>
        @endif
    </div>
    <div class="page__paginator-box page-articles__paginator-box">
        {{ $articles->onEachSide(1)->links('pagination.default') }}
    </div>


</section>

@endsection
