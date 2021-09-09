<?php

namespace App\Models;

use Log;
use Date;
use Storage;
use Exception;


use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{


    protected $photos_fields = [
        [
            'name' => 'photos',
            'type' => 'array',
        ]
    ];

    /* Mutators */

    public function getCreatedDateTimeAttribute()
    {
        return Date::parse($this->created_at)->format('d F Y H:i');
    }

    public function getUpdatedDateTimeAttribute()
    {
        return Date::parse($this->updated_at)->format('d F Y H:i');
    }


    public static function getRepository()
    {
        return app('\\App\\Repositories\\'.class_basename(static::class).'Repository');
    }


    /**
     * importants
     */
    public function getImportantFields():array
    {
        return [];
    }
     /**
     * isImportantChanges - check if was updating important fields
     *
     * @return bool
     */
    public function isImportantDirty():bool
    {
        foreach ($this->getDirty() as $key => $value) {
            if(in_array($key,$this->getImportantFields()))
                return true;
        }
        return false;
    }
    /**
     * isImportantChanges - check if was updated important fields
     *
     * @return bool
     */
    public function isImportantChanges():bool
    {
        foreach ($this->getChanges() as $key => $value) {
            if(in_array($key,$this->getImportantFields()))
                return true;
        }
        return false;
    }
    /**
     * scopes
     */
    public function scopeVisible($query)
    {
        return $query->where('visible',true);
    }

}
