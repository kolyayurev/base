@php
    $position = 0;
@endphp
@if ($breadcrumbs->count())
<nav class="container breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
    <ul class="breadcrumb-wrap">
        @foreach ($breadcrumbs as $breadcrumb)
            <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"
                class="breadcrumb-item">
                <a  itemprop="item" 
                    {{-- title="{{ $breadcrumb->title }}" --}}
                    href="{{ $breadcrumb->url }}" 
                    class="breadcrumb-link {{ $loop->last?'disabled':''}}">
                    <span itemprop="name">{{ $breadcrumb->title }}</span>
                    <meta itemprop="position" content="{{++$position}}"/>
                </a>
            </li>
        @endforeach
    </ul>
</nav>
@endif