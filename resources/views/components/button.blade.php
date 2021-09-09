
@switch($type)
    @case('question')
        @if (setting('formy.questions'))
            <button {{ $attributes->merge(['class'=>"btn btn-question"]) }}>{{ $text??trans('common.buttons.ask_doctor_question') }}</button>
        @endif
        @break
    @case('appointment')
        @if (setting('formy.appointment'))
            <button {{ $attributes->merge(['class'=>"btn btn-signup"]) }} >{{ $text??trans('common.buttons.subscribe_appointment')}}</button>
        @endif
        @break
    @default
    <button {{ $attributes->merge(['class'=>"btn "]) }}>{{ $text }}</button>
@endswitch



