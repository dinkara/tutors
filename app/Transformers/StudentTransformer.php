<?php

namespace App\Transformers;

use App\Models\Student;
use Dinkara\DinkoApi\Transformers\ApiTransformer;
/**
 * Description of StudentTransformer
 *
 * @author Dinkic
 */
class StudentTransformer extends ApiTransformer{
    
    protected $defaultIncludes = [];
    protected $availableIncludes = ['user', 'comments'];
    protected $pivotAttributes = [];
    
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Student $item)
    {
        return $this->transformFromModel($item, $this->pivotAttributes);
    }
    
    public function includeUser(Student $item)
    { 
       return $this->item($item->user, new UserTransformer());
    }
    public function includeComments(Student $item)
    {
       return $this->collection($item->comments, new CommentTransformer());
    }


    
}
