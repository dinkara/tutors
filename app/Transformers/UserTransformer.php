<?php

namespace App\Transformers;

use App\Models\User;
use Dinkara\DinkoApi\Transformers\ApiTransformer;
/**
 * Description of UserTransformer
 *
 * @author Dinkic
 */
class UserTransformer extends ApiTransformer{
    
    protected $defaultIncludes = ['profile'];
    protected $availableIncludes = ['sentences', 'students', 'roles', 'socialNetworks'];
    protected $pivotAttributes = ['access_token', 'provider_id'];
    
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(User $item)
    {
        return $this->transformFromModel($item, $this->pivotAttributes);
    }
    
    public function includeProfile(User $item)
    { 
       return $this->item($item->profile, new ProfileTransformer());
    }
    public function includeSentences(User $item)
    {
       return $this->collection($item->sentences, new SentenceTransformer());
    }
    public function includeStudents(User $item)
    {
       return $this->collection($item->students, new StudentTransformer());
    }
    public function includeRoles(User $item)
    {
       return $this->collection($item->roles, new RoleTransformer());
    }
    public function includeSocialNetworks(User $item)
    {
       return $this->collection($item->socialNetworks, new SocialNetworkTransformer());
    }


    
}
