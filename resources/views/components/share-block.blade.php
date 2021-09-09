
@if (count($items))
    <div {{ $attributes->merge(['class'=>""]) }} >
        <p class="page-card__add-text page-card__add-subtitle">@lang('components.share_block.subtitle')</p>

        <div class="page-card__add-social">

            @foreach ($items as $item)
                @switch($item)
                    @case('facebook')
                        <a href="{{Share::text($title)->facebook()}}" class="social__link share__link add-social__link">
                            <img src="{{ asset('img/icons/ico-fb-bg.svg') }}" alt="{{ trans('components.share_block.alts.share_in_facebook') }}">
                        </a>
                        @break
                    @case('vk')
                        <a href="{{Share::text($title)->vk()}}" class="social__link share__link add-social__link">
                            <img src="{{ asset('img/icons/ico-vk-bg.svg') }}" alt="@lang('components.share_block.alts.share_in_vk')">
                        </a>
                        @break
                    @case('odnoklassniki')
                        <a href="{{Share::text($title)->odnoklassniki()}}" class="social__link share__link add-social__link">
                            <img src="{{ asset('img/icons/ico-ok-bg.svg') }}" alt="@lang('components.share_block.alts.share_in_ok')">
                        </a>
                        @break
                    @case('twitter')
                        <a href="{{Share::text($title)->twitter()}}" class="social__link share__link add-social__link">
                            <img src="{{ asset('img/icons/ico-tw-bg.svg') }}" alt="@lang('components.share_block.alts.share_in_twitter')">
                        </a>
                        @break
                @endswitch
            @endforeach
        </div>
    </div>
@endif
