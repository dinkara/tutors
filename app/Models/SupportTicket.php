<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dinkara\RepoBuilder\Traits\ApiModel;

class SupportTicket extends Model
{
    use ApiModel;
    
    
    
    protected $table = "support_tickets";
       
    /**
     * The attributes by you can search data.
     *
     * @var array
     */
    protected $searchableColumns = ['title', 'category', 'content'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'category', 'content'];
    
    /**
     * The attributes that are will be shown in transformer
     *
     * @var array
     */
    protected $displayable = ['title', 'category', 'content'];
    
    public $timestamps = true;
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
