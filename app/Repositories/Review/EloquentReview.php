<?php

namespace App\Repositories\Review;

use Dinkara\RepoBuilder\Repositories\EloquentRepo;
use App\Models\Review;
use App\Models\Sentence;



class EloquentReview extends EloquentRepo implements IReviewRepo {


    public function __construct() {

    }

    /**
     * Configure the Model
     * */
    public function model() {
        return new Review;
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
