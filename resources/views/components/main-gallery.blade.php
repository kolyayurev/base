@php
    $items = widget('karusel-na-glavnoj');
@endphp
@if (!empty($items))
    <div class="promo-slider @auth widget @endauth">
        <x-widget-edit-button :id="1"></x-widget-edit-button>
        <div class="promo-slider__container">
            @foreach ($items as $item)
            <div class="promo-slider__item" style="background-image: url('{{ Voyager::image($item->url)}}')">
                <div class="promo-slide__item-content">
                    <h3 class="promo-slide__title">{{ $item->title }}</h3>
                    <div class="promo-slider__text">
                        <p>{!! nl2br(e($item->description)) !!}</p>
                        @if (isset($item->buttons) && count($item->buttons))
                        <div class="promo-slider__buttons">
                            @foreach ($item->buttons as $button)
                                <x-button-link :options="$button" class="mtrb-1"></x-button-link>
                            @endforeach
                        </div>
                        @endif

                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
@endif
@push('scripts')
<script>
    $(document).ready(function () {
        $('.promo-slider__container').slick({
            dots: true,
            arrows: false,
            // fade: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 4000,
            slidesToShow: 1,
            slidesToScroll: 1,
        });
    });
</script>
@endpush
