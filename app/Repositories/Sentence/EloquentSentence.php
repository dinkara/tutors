<?php

namespace App\Repositories\Sentence;

use Dinkara\RepoBuilder\Repositories\EloquentRepo;
use App\Models\Sentence;
use App\Models\Category;

use DB;

class EloquentSentence extends EloquentRepo implements ISentenceRepo {


    public function __construct() {

    }

    /**
     * Configure the Model
     * */
    public function model() {
        return new Sentence;
    }
    
    public function searchByText($text){
        $this->initialize();        
        return $this->model()->select(DB::raw("min(id) as id"), "text")->where('text', 'like' , "%$text%")->groupBy("text")->get();
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
