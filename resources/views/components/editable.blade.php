@props(['tag'=> 'div','text'=>__('common.buttons.edit'),'url','target'=>'_blank'])
{{-- TODO: customization access control  --}}
<{{$tag}} 
    {{ $attributes->class(['widget'=>auth()->check() && auth()->user()->can('browse_admin')]) }} >
    @can('browse_admin')
        <a class="widget__edit-button" href="{{ $url }}" target="{{ $target }}">
            {{ $text }}
        </a>
    @endcan
    {{ $slot }}
</{{$tag}}>
