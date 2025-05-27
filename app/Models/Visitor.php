<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'ip_address',
        'device',
        'location',
    ];

    public function getDeviceAttribute($value)
    {
        return json_decode($value);
    }

    public function setDeviceAttribute($value)
    {
        $this->attributes['device'] = json_encode($value);
    }
    public function getLocationAttribute($value)
    {
        return json_decode($value);
    }
    public function setLocationAttribute($value)
    {
        $this->attributes['location'] = json_encode($value);
    }   
}