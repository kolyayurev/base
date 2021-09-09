@if (!empty($items))    
<section {{ $attributes->class(["container-max section facts",'widget'=>auth()->check()]) }}>
    <x-widget-edit-button :id="2"></x-widget-edit-button>
    <div class="container facts-wrap">
    @foreach ($items as $item)
        <div class="fact-item">
            <h3 class="fact-title"><span class="fact-title__number">{{$item->number}}</span> <span
                    class="fact-title__text">{{$item->suffix}}</span></h3>
            <p class="fact-text">{{$item->text}}</p>
        </div>
    @endforeach
    </div>
</section>
@endif
