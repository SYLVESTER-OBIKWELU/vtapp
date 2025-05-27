<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'body',
        'status',
        'ip',
    ];

    public function scopeSearch($query, $value){
        $query->where('email','like',"%{$value}%")->orWhere('subject','like',"%{$value}%");
    }

    

    
}