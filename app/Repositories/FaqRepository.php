<?php
namespace App\Repositories;

use App\Models\Faq;

class FaqRepository extends BaseRepository
{
    
    public function model()
    {
        return app(Faq::class);
    }
    
    public function getForList($paginate = 12, $specialization = null, $order = 'asc',$select = ['*'])
    {
        return $this->query
                    ->select($select)
                    ->orderBy($this->order_column,$order)
                    ->when($specialization,function($q) use ($specialization){
                        $q->whereHas('specializations', function ($q) use ($specialization){
                            $q->where('slug', $specialization);
                        });
                    })
                    ->with([
                        'doctor'=>function($q){
                            $q->select(['doctors.id','last_name','first_name','patronymic','slug'])
                                ->with(['specializations'=>function($q){
                                    $q->select(['specializations.id','name','slug','doctor_name']);
                                }])
                            ->visible();
                        },
                        'specializations',
                    ])
                    ->visible()
                    ->published()
                    ->paginate($paginate);
    }
}