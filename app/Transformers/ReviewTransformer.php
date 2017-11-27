<?php

namespace App\Transformers;

use App\Models\Review;
use Dinkara\DinkoApi\Transformers\ApiTransformer;
/**
 * Description of ReviewTransformer
 *
 * @author Dinkic
 */
class ReviewTransformer extends ApiTransformer{
    
    protected $defaultIncludes = [];
    protected $availableIncludes = ['sentences', 'students'];
    protected $pivotAttributes = ['order', 'joiner'];
    
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Review $item)
    {
        return $this->transformFromModel($item, $this->pivotAttributes);
    }
    
    public function includeSentences(Review $item)
    {
       return $this->collection($item->sentences, new SentenceTransformer());
    }
    public function includeStudents(Review $item)
    {
       return $this->collection($item->students, new StudentTransformer());
    }


    
}
