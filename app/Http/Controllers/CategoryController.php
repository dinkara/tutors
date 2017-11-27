<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\Category\ICategoryRepo;
use App\Transformers\CategoryTransformer;
use Tymon\JWTAuth\Facades\JWTAuth;
use Dinkara\DinkoApi\Http\Controllers\ResourceController;
use ApiResponse;


/**
 * @resource Category
 */
class CategoryController extends ResourceController
{

    
    
    public function __construct(ICategoryRepo $repo, CategoryTransformer $transformer) {
        parent::__construct($repo, $transformer);
	
    
    
    
    }
    
    /**
     * Create item
     * 
     * Store a newly created item in storage.
     *
     * @param  App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {       
            $data = $request->only($this->repo->getModel()->getFillable());
	
            return $this->storeItem($data);
    }

    /**
     * Update item 
     * 
     * Update the specified item in storage.
     *
     * @param  App\Http\Requests\UpdateCategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
            $data = $request->only($this->repo->getModel()->getFillable());
	
            return $this->updateItem($data, $id);
    }
    


}