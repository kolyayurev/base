<?php

namespace App\Voyager\Dimmers;

use Str;
use Auth;

use App\Models\Feedback;

use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Dimmers\BaseDimmer;

class FeedbackDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Feedback::notViewed()->count();
        
        $string = trans_choice('dimmers.new_feedback', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-chat',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager::dimmer.page_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => 'Просмотреть',
                'link' => route('voyager.feedbacks.index',['key'=>'viewed', 'filter'=>'equals','s'=>false]),
            ],
            'image' => '',
            'color' => '#00ff95',
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', app(Feedback::class));
    }
}
