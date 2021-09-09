<?php
namespace App\Repositories;

use App\Models\{Page};

class PageRepository extends BaseRepository
{

    public function model()
    {
        return app(Page::class);
    }

    public function getActiveBySlug($slug,$select = ['*'])
    {
       return  $this->query->select($select)->whereSlug($slug)->visible()->first();
    }
}
