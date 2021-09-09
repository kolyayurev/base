<?php
namespace App\Repositories;

use App\Models\Article;

class ArticleRepository extends BaseRepository
{
    
    public function model()
    {
        return app(Article::class);
    }
    public function getForList($paginate = 12,$select = ['*'])
    {
        return $this->query->select($select)->where('visible',true)->published()->paginate($paginate);
    }
    public function getForShow($slug,$select = ['*'])
    {
       return  $this->query->select($select)
                            ->whereSlug($slug)
                            ->with(['doctor'=>function($q){
                                $q->select(['id','last_name','first_name','patronymic','slug','image'])
                                ->with(['specializations'=>function($q){
                                    $q->select(['specializations.id','name','slug','doctor_name']);
                                }])
                                ->visible();
                            }])
                            ->visible()
                            ->published()
                            ->first();
    }
}