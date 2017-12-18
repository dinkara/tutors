<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dinkara\RepoBuilder\Traits\ApiModel;

class Sentence extends Model
{
    use ApiModel;
    
    
    
    protected $table = "sentences";
       
    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = ['text'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'text'];
    
    /**
     * The attributes that are will be shown in transformer
     *
     * @var array
     */
    protected $displayable = ['text'];
    
    public $timestamps = true;
    
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'sentences_categories', 'sentence_id', 'category_id')->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function comments()
    {
        return $this->belongsToMany('App\Models\Comment', 'comments_sentences', 'sentence_id', 'review_id')->withTimestamps()->withPivot('order', 'joiner');
    }

}
