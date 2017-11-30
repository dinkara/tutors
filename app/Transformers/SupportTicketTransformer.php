<?php

namespace App\Transformers;

use App\Models\SupportTicket;
use Dinkara\DinkoApi\Transformers\ApiTransformer;
/**
 * Description of SupportTicketTransformer
 *
 * @author Dinkic
 */
class SupportTicketTransformer extends ApiTransformer{
    
    protected $defaultIncludes = [];
    protected $availableIncludes = ['user'];
    protected $pivotAttributes = [];
    
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(SupportTicket $item)
    {
        return $this->transformFromModel($item, $this->pivotAttributes);
    }
    
    public function includeUser(SupportTicket $item)
    { 
       return $this->item($item->user, new UserTransformer());
    }


    
}
