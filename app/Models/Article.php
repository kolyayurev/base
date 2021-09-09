<?php

namespace App\Models;

use Date;

use App\Models\Doctor;

use App\Traits\HasSeo;
use App\Traits\HasMedia;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Article extends BaseModel implements Searchable
{
    use HasSeo;
    use HasMedia;

    /**
     * Statuses.
     */
    public const STATUS_DRAFT = 'DRAFT';
    public const STATUS_PENDING = 'PENDING';
    public const STATUS_PUBLISHED= 'PUBLISHED';

    /**
     * List of statuses.
     *
     * @var array
     */
    public static $statuses = [self::STATUS_DRAFT, self::STATUS_PENDING, self::STATUS_PUBLISHED];

    protected $dates = ['created_at','updated_at','published_at'];
    // protected $photos_directory = 'articles';

    protected $photos_fields = 
    [
        [
            'name' => 'image',
            'type' => 'single',
            'thumbnails' =>[
                'medium',
                'small',
                'small-rectangle'
            ]
        ],
        [
            'name' => 'photos',
            'type' => 'array',
            'thumbnails' =>[
                'medium',
                'small',
                'small-rectangle'
            ]
        ],
    ];

    public function getSearchResult(): SearchResult
    {
        $url = route('articles.show', $this->slug);
     
        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }

    /**
     * Relationships
     */

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
