<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = [
        'contact_id',
        'email',
        'body',
    ];

    public function message(){
        return $this->hasOne('App\Models\Contact','id','contact_id');
    }

        public function scopeSearch($query, $value){
        $query->where('email','like',"%{$value}%");
    }
}
