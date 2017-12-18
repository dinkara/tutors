<?php

namespace App\Repositories\Student;

use Dinkara\RepoBuilder\Repositories\EloquentRepo;
use App\Models\Student;
use App\Models\Comment;



class EloquentStudent extends EloquentRepo implements IStudentRepo {


    public function __construct() {

    }

    /**
     * Configure the Model
     * */
    public function model() {
        return new Student;
    }
    
    public function attachComment(Comment $model, array $data = []){
        if (!$this->model) {
            return false;
        }	

	$result = $this->model->comments()->attach($model, $data);
        
        return $this->finalize($this->model);
    }


    public function detachComment(Comment $model){
        if (!$this->model) {
            return false;
        }
	
	$result = $this->model->comments()->detach($model);
        
        return $this->finalize($this->model);
    }

    

}
