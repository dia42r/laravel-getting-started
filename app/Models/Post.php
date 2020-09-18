<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use App\Models\Tag;

class Post extends Model
{
    protected $fillable = ['title', 'content'];

    use HasFactory;

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }


    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // Mutator : transform before save
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }

    // Accessor :  transform after retrieve
    public function getTitleAttribute($value)
    {
        return strtoupper($value);
    }
}
