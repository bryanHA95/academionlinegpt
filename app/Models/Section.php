<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    //1 a muchos
    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }

    //1 a muchos inversa
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
