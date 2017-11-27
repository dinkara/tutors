<?php

namespace App\Repositories\Student;

use Dinkara\RepoBuilder\Repositories\IRepo;
use App\Models\Review;

/**
 * Interface StudentRepository
 * @package App\Repositories\Student
 */
interface IStudentRepo extends IRepo {
   
    function attachReview(Review $model, array $data = []);


    function detachReview(Review $model);


}