<?php

namespace App\Transformers;

use App\Models\Sentence;
use Dinkara\DinkoApi\Transformers\ApiTransformer;
/**
 * Description of SentenceTransformer
 *
 * @author Dinkic
 */
class SentenceTransformer extends ApiTransformer{
    
    protected $defaultIncludes = ['categories'];
    protected $availableIncludes = ['user', 'comments'];
    protected $pivotAttributes = ['order', 'joiner'];
    
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Sentence $item)
    {
        return $this->transformFromModel($item, $this->pivotAttributes);
    }
    
    public function includeUser(Sentence $item)
    { 
       return $this->item($item->user, new UserTransformer());
    }
    public function includeCategories(Sentence $item)
    {
       return $this->collection($item->categories, new CategoryTransformer());
    }
    public function includeComments(Sentence $item)
    {
       return $this->collection($item->comments, new CommentTransformer());
    }


    
}
