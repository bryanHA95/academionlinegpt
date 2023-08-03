<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    //1 a muchos
    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }
}
