<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dinkara\RepoBuilder\Traits\ApiModel;

class Student extends Model
{
    use ApiModel;
    
    
    
    protected $table = "students";
       
    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = ['name', 'nick', 'gender'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'nick', 'gender'];
    
    /**
     * The attributes that are will be shown in transformer
     *
     * @var array
     */
    protected $displayable = ['name', 'nick', 'gender'];
    
    public $timestamps = true;
    
    public function comments()
    {
        return $this->belongsToMany('App\Models\Comment', 'students_comments', 'student_id', 'review_id')->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
