<?php

namespace App\Repositories\Sentence;

use Dinkara\RepoBuilder\Repositories\IRepo;
use App\Models\Category;

/**
 * Interface SentenceRepository
 * @package App\Repositories\Sentence
 */
interface ISentenceRepo extends IRepo {
   
    function attachCategory(Category $model, array $data = []);


    function detachCategory(Category $model);


}