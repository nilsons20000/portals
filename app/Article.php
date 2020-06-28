<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Article extends Model
{
  protected $dates = ['name_field'];

  protected $fillable = ['id', 'title','slug','description_short','description','image_path','meta_title', 'meta_description','meta_keyword','published', 'created_by', 'modified_by','author_id','likes'];

  public function setSlugAttribute($value){
    $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
  }  

  public function categories(){
    return $this->morphToMany('App\Category', 'categoryable');
  } 

  public function scopeLastArticles($query, $count){
    return $query->orderBy('created_at', 'desc')->take($count)->get();
  }

  public function image(){
    return $this->hasMany('App\PostImage', 'posts_images');
  }

  public function user(){
    return $this->belongsTo(User::class, 'author_id');
  }

  public function comment(){
    return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
  }

  public function likes(){
    return $this->belongsTo('App\Like');
  }
   
}
