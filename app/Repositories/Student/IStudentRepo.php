<?php

namespace App\Repositories\Student;

use Dinkara\RepoBuilder\Repositories\IRepo;
use App\Models\Comment;

/**
 * Interface StudentRepository
 * @package App\Repositories\Student
 */
interface IStudentRepo extends IRepo {
   
    function attachComment(Comment $model, array $data = []);


    function detachComment(Comment $model);


}