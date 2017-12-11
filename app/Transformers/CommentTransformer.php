<?php

namespace App\Transformers;

use App\Models\Comment;
use Dinkara\DinkoApi\Transformers\ApiTransformer;
/**
 * Description of CommentTransformer
 *
 * @author Dinkic
 */
class CommentTransformer extends ApiTransformer{
    
    protected $defaultIncludes = [];
    protected $availableIncludes = ['user', 'sentences', 'students'];
    protected $pivotAttributes = ['order', 'joiner'];
    
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Comment $item)
    {
        return $this->transformFromModel($item, $this->pivotAttributes);
    }
    
    public function includeUser(Comment $item)
    { 
       return $this->item($item->user, new UserTransformer());
    }
    public function includeSentences(Comment $item)
    {
       return $this->collection($item->sentences, new SentenceTransformer());
    }
    public function includeStudents(Comment $item)
    {
       return $this->collection($item->students, new StudentTransformer());
    }


    
}
