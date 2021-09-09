<?php

namespace App\Models;


use Auth;

use App\Traits\HasSeo;

use TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Traits\Widgetable;

class Page extends BaseModel
{
    use HasSeo;
    use Widgetable;
    // protected $translatable = ['title', 'slug', 'body'];

    protected $guarded = [];

    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->author_id && Auth::user()) {
            $this->author_id = Auth::user()->getKey();
        }

        return parent::save();
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('pages.show', $this->slug);

        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }

}
