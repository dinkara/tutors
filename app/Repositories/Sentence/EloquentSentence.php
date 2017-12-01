<?php

namespace App\Repositories\Sentence;

use Dinkara\RepoBuilder\Repositories\EloquentRepo;
use App\Models\Sentence;
use App\Models\Category;



class EloquentSentence extends EloquentRepo implements ISentenceRepo {


    public function __construct() {

    }

    /**
     * Configure the Model
     * */
    public function model() {
        return new Sentence;
    }
    
    public function attachCategory(Category $model, array $data = []){
        if (!$this->model) {
            return false;
        }	

	$result = $this->model->categories()->attach($model, $data);
        
        return $this->finalize($this->model);
    }


    public function detachCategory(Category $model){
        if (!$this->model) {
            return false;
        }
	
	$result = $this->model->categories()->detach($model);
        
        return $this->finalize($this->model);
    }

    

}
