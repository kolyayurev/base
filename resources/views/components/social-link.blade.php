@if ($existUrl())
<a href="{{ $url() }}" target="_blank" {{ $attributes->merge(['class'=>""]) }} rel="nofollow">
    <img src="{{ asset("img/icons/ico-{$icon}.svg") }}" alt="{{ $imgAlt }}" class="{{ $imgClass }}">
    {{ $slot }}
</a>
@endif