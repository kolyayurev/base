@extends('layouts.app')
@php
    Meta::setTitle(trans('pages.404.title'));
@endphp

@section('content')
<div class="container">
    <div class=" page-error">
        <div class=" error-page__img">
            <img src="{{ Voyager::image('defaults/default_error_404.svg') }}" alt="404" class="image">
            {{-- @svginline('errors/error-404.svg',['class'=>'image']) --}}
        </div>
        <div class=" error-page__content">
            <div class="error-page__code">
                404
            </div>
            <div class="error-page__message">
                {{trans('pages.404.text')}}
            </div>
        </div>
    </div>
</div>
    
@endsection