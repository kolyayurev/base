
@php
    if (is_null($options)) {
        $options = new stdClass();
    }
    if (is_string($options)) {
        $options = json_decode($options, FALSE);
    }
@endphp
@switch($options->type??'')
    @case('button')
        <x-button class="{{$options->colorShema}}" :type="$options->buttonType" :text="$options->text"></x-button>
        @break
    @case('link')
        @php
            $link = route_or_url($options->linkType,$options->link,$options->linkDetails);
        @endphp
        <a  
            href="{{$link}}"
            {{ $attributes->merge(['class'=>"btn {$options->colorShema} {$options->colorShema}"]) }}
            target="{{ $options->target??'_self' }}"
            @if (isset($options->target) && $options->target == '_blank')
                rel="nofollow"
            @endif
            >
            {{ $options->text??'' }}
        </a>
        @break
@endswitch


