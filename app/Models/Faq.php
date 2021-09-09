<?php

namespace App\Models;

use Date;

use App\Models\Doctor;
use App\Models\Specialization;

class Faq extends BaseModel
{
    protected $dates = ['created_at','updated_at','published_at'];


    public function getPublishedDateAttribute($date)
    {
        return Date::parse($this->published_at)->format('d F Y');
    }

    /**
     * Relationships
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    
    public function specializations()
    {
        return $this->belongsToMany(Specialization::class);
    }
}
