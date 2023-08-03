<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    public function getCompletedAttribute()
    {
        return $this->users->contains(auth()->user()->id);
    }

    //1 a 1
    public function description()
    {
        return $this->hasOne('App\Models\Description');
    }

    //1 a muchos inversa
    public function section()
    {
        return $this->belongsTo('App\Models\Section');
    }

    public function platform()
    {
        return $this->belongsTo('App\Models\Platform');
    }

    //muchos a muchos
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    //1 a 1 polimorfica
    public function resource()
    {
        return $this->morphOne('App\Models\Resource', 'resourceable');
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
