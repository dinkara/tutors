<?php

namespace App\Repositories\Review;

use Dinkara\RepoBuilder\Repositories\IRepo;
use App\Models\Sentence;

/**
 * Interface ReviewRepository
 * @package App\Repositories\Review
 */
interface IReviewRepo extends IRepo {
   
    function attachSentence(Sentence $model, array $data = []);


    function detachSentence(Sentence $model);


}