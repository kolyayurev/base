<?php

namespace App\Models;


class Feedback extends BaseModel
{
    protected $table = 'feedbacks'; 
  
    protected $fillable = [
        'phone',
        'text',
    ];

    /**
     * scopes
     */
    public function scopeNotViewed($query)
    {
        return $query->where('viewed',false);
    }
}
