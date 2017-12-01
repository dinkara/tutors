<?php

namespace App\Repositories\Comment;

use Dinkara\RepoBuilder\Repositories\EloquentRepo;
use App\Models\Comment;
use App\Models\Sentence;



class EloquentComment extends EloquentRepo implements ICommentRepo {


    public function __construct() {

    }

    /**
     * Configure the Model
     * */
    public function model() {
        return new Comment;
    }
    
    public function attachSentence(Sentence $model, array $data = []){
        if (!$this->model) {
            return false;
        }	

	$result = $this->model->sentences()->attach($model, $data);
        
        return $this->finalize($this->model);
    }


    public function detachSentence(Sentence $model){
        if (!$this->model) {
            return false;
        }
	
	$result = $this->model->sentences()->detach($model);
        
        return $this->finalize($this->model);
    }

    

}
