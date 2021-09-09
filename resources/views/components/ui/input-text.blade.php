<div class='component-input-text {{$theme}}' style="width:{{$width}};" >
    @if($label) 
    <label for="{{$id}}" class="component-input-text__label">{{$label}}</label>
    @endif
    <input 
            {{ $attributes->merge(['class'=>"component-input-text__inner-input"]) }}
            type="text" 
            name="{{$name}}" 
            @if($id) id="{{$id}}" @endif
            placeholder="{{$placeholder}}" 
            value="{{$value}}">
    {{-- {{ $slot }} --}}
</div>