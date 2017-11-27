<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dinkara\RepoBuilder\Traits\ApiModel;

class Category extends Model
{
    use ApiModel;
    
    
    
    protected $table = "categories";
       
    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = ['name', 'color'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'color'];
    
    /**
     * The attributes that are will be shown in transformer
     *
     * @var array
     */
    protected $displayable = ['name', 'color'];
    
    public $timestamps = true;
    
    public function sentences()
    {
        return $this->belongsToMany('App\Models\Sentence', 'sentences_categories', 'category_id', 'sentence_id')->withTimestamps();
    }

}
