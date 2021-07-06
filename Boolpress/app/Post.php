<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo('App\Category'); //cosi stiamo dicendo che il post appartiene alle category
    }

    public function tags(){ //tags al plurale perche è una relazione molti a molti quindi useremo tags e posts
        return $this->belongsToMany('App\Tag');
    }
}
