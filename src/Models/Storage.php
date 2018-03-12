<?php

namespace nikitin\KeyStorage\Models;

use nikitin\KeyStorage\Helpers\StorageHelper;

class Storage extends Model
{
    use StorageHelper;

    protected $guarded = ['id'];
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    protected $connection;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('key-storage.table');
    }

    public function getValueAttribute($value){
        $type = $this->getTypeById($this->attributes['type']);
        switch ($type){
            case 'integer':
                return (int)$value;
            case 'string':
                return (string)$value;
            case 'boolean':
                return (bool)$value;
            case 'array':
                return json_decode($value,true);
            case 'object':
                return unserialize($value);
        }

    }


    public function setValueAttribute($value){
        $type = gettype($value);
        $this->attributes['type'] = $this->getTypeId($type);
        switch ($type) {
            case 'integer':
                $this->attributes['value'] = (int)$value;
                break;
            case 'array':
                $this->attributes['value'] = json_encode($value);
                break;
            case 'object':
                $this->attributes['value'] = serialize($value);
                break;
            default:
                $this->attributes['value'] = (string)$value;
        }
    }


}