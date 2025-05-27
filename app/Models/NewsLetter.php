<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    protected $fillable = [
        'email',
    ];

    public function scopeSearch($query, $value){
        $query->where('email','like',"%{$value}%");
    }
}