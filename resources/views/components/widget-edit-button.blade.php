@props(['id'=> null])

@auth
<button class="widget__edit-button" onclick="event.preventDefault(); window.open('{{ route('voyager.widgets.moderate',$id) }}', '_blank');" target="_blank">
    @lang('common.buttons.edit')
</button>
@endauth
