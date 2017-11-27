<?php

namespace App\Transformers;

use App\Models\Category;
use Dinkara\DinkoApi\Transformers\ApiTransformer;
/**
 * Description of CategoryTransformer
 *
 * @author Dinkic
 */
class CategoryTransformer extends ApiTransformer{
    
    protected $defaultIncludes = [];
    protected $availableIncludes = ['sentences'];
    protected $pivotAttributes = [];
    
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Category $item)
    {
        return $this->transformFromModel($item, $this->pivotAttributes);
    }
    
    public function includeSentences(Category $item)
    {
       return $this->collection($item->sentences, new SentenceTransformer());
    }


    
}
