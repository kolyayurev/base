<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository 
{

    protected $order_column = 'sort_order';

    protected $query;

    const CITY_ID = 1;

    
    public function __construct()
    {
        $this->query = $this->model();
    }

    public function model()
    {
        return Model::class;
    }
    public function all($select = ['*'])
    {
        return $this->query->select($select)->get();
    }
    public function allVisible($select = ['*'])
    {
        return $this->query->select($select)->where('visible',true)->get();
    }
    public function existBySlug($slug)
    {
        return $this->query->whereSlug($slug)->exists();
    }
    public function paginateVisible($paginate = 12,$select = ['*'])
    {
        return $this->query->select($select)->where('visible',true)->paginate($paginate);
    }
 
    public function getFirstOrder($count,$order = 'asc',$select = ['*'])
    {
       return  $this->query->select($select)->orderBy($this->order_column,$order)->take($count)->get();
    }
    public function getFirstOrderVisible($count,$order = 'asc',$select = ['*'])
    {
       return  $this->query->select($select)->orderBy($this->order_column,$order)->visible()->take($count)->get();
    }
    public function getFirstOrderVisiblePublished($count,$order = 'asc',$select = ['*'])
    {
       return  $this->query->select($select)->orderBy($this->order_column,$order)->visible()->published()->take($count)->get();
    }
    public function getBySlug($slug,$select = ['*'])
    {
       return  $this->query->select($select)->whereSlug($slug)->first();
    }
    public function getForList($paginate = 12,$select = ['*'])
    {
        return $this->query->select($select)->where('visible',true)->orderBy($this->order_column,'asc')->paginate($paginate);
    }
    public function getForShow($slug,$select = ['*'])
    {
       return  $this->query->select($select)->whereSlug($slug)->visible()->first();
    }

}