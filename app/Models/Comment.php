<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dinkara\RepoBuilder\Traits\ApiModel;

class Comment extends Model
{
    use ApiModel;
    
    
    
    protected $table = "comments";
       
    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = ['text', 'caption', 'favorite', 'score', 'count'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['text', 'caption', 'favorite', 'user_id', 'score', 'count'];
    
    /**
     * The attributes that are will be shown in transformer
     *
     * @var array
     */
    protected $displayable = ['text', 'caption', 'favorite', 'score', 'count', 'created_at'];
    
    public $timestamps = true;
    
    public function sentences()
    {
        return $this->belongsToMany('App\Models\Sentence', 'comments_sentences', 'review_id', 'sentence_id')->withTimestamps()->withPivot('order', 'joiner');
    }
    public function students()
    {
        return $this->belongsToMany('App\Models\Student', 'students_comments', 'review_id', 'student_id')->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
