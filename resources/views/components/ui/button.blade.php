@php
    $is_link = $link? true :false;
@endphp
<{{$is_link?'a':'button'}} 
    {{ $attributes->merge(['class' => "component-button $theme "]) }} 
    style="width:{{$width}};font-size:{{$fontSize}};"
    @if($is_link) href="{{$link}}" @endif>
    @if($icon && $iconSide == 'left')
        <i class="component-button__icon left fas fa-{{$icon}}"></i>
    @endif
    {{$slot}}
    @if($icon && $iconSide == 'right')
        <i class="component-button__icon right fas fa-{{$icon}}"></i>
    @endif
</{{$is_link?'a':'button'}}>