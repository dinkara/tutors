<?php

namespace App\Repositories\Student;

use Dinkara\RepoBuilder\Repositories\EloquentRepo;
use App\Models\Student;
use App\Models\Review;



class EloquentStudent extends EloquentRepo implements IStudentRepo {


    public function __construct() {

    }

    /**
     * Configure the Model
     * */
    public function model() {
        return new Student;
    }
    
    public function attachReview(Review $model, array $data = []){
        if (!$this->model) {
            return false;
        }	

	$result = $this->model->reviews()->attach($model, $data);
        
        return $this->finalize($this->model);
    }


    public function detachReview(Review $model){
        if (!$this->model) {
            return false;
        }
	
	$result = $this->model->reviews()->detach($model);
        
        return $this->finalize($this->model);
    }

    

}
