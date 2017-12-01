<?php

namespace App\Repositories\Comment;

use Dinkara\RepoBuilder\Repositories\IRepo;
use App\Models\Sentence;

/**
 * Interface CommentRepository
 * @package App\Repositories\Comment
 */
interface ICommentRepo extends IRepo {
   
    function attachSentence(Sentence $model, array $data = []);


    function detachSentence(Sentence $model);


}