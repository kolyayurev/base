<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: http://ogp.me/ns#" @yield('html-attribute')>

<head>
    {!! Meta::toHtml() !!}
    @stack('metas')

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @can('browse_admin')
    <link rel="stylesheet" href="{{voyager_asset('css/front.css')}}">
    @endcan

    @stack('styles')

    @yield('breadcrumbs-json')

    @stack('head-scripts')
</head>

<body id="@yield('body-id', 'main')" class="@yield('body-class')">
    @include('voyager::partials.front.admin-controls')

    @include('layouts.parts.header')
    
    @yield('before-content')
    <main class="main">
        {{-- <div class="container breadcrumbs">
            @yield('breadcrumbs')
        </div> --}}
        @yield('content')
    </main>
    @include('layouts.parts.footer')

    <div class="buttons-panel">
        @stack('buttons-panel')
        <x-button-up ></x-button-up>
    </div>

    <script>
        var locale = '{{ app()->getLocale()}}';
        var fallbackLocale = '{{ config('app.fallback_locale')}}';
    </script>
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>

    @can('browse_admin')
        <script src="{{voyager_asset('js/front.js')}}"></script>
    @endcan
    
    {!! Meta::footer()->toHtml() !!}
    <div id="modals">
        @stack('vue-modals')
    </div>
    @stack('vue')
    <script>
        var vueModals = new Vue({
            el : '#modals',
            data(){
                return {
                }
            },
        });
    </script>
    @stack('scripts')
</body>

</html>

