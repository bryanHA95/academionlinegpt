<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    public function commentable()
    {
        return $this->morphTo();
    }

    //1 a 1 inversa
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //1 a muchos polimorfica
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function reactions()
    {
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }
}
