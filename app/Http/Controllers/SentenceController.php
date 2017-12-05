<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSentenceRequest;
use App\Http\Requests\UpdateSentenceRequest;
use App\Repositories\Sentence\ISentenceRepo;
use App\Transformers\SentenceTransformer;
use Tymon\JWTAuth\Facades\JWTAuth;
use Dinkara\DinkoApi\Http\Controllers\ResourceController;
use ApiResponse;
use App\Http\Requests\SentenceAttachCategoryRequest;
use App\Repositories\Category\ICategoryRepo;


/**
 * @resource Sentence
 */
class SentenceController extends ResourceController
{

    /**
     * @var ICategoryRepo 
     */
    private $categoryRepo;
        
    
    public function __construct(ISentenceRepo $repo, SentenceTransformer $transformer, ICategoryRepo $categoryRepo) {
        parent::__construct($repo, $transformer);
	
        $this->middleware('owns.sentence', ['only' => ['update', 'destroy']]);

        $this->middleware('exists.sentence', ['only' => ['attachCategory', 'detachCategory']]);
    
        $this->middleware('exists.category:category_id,true', ['only' => ['attachCategory', 'detachCategory']]);

        $this->middleware('owns.sentence', ['only' => ['attachCategory', 'detachCategory']]);

    	$this->categoryRepo = $categoryRepo;

    }
    
    /**
     * Create item
     * 
     * Store a newly created item in storage.
     *
     * @param  App\Http\Requests\StoreSentenceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSentenceRequest $request)
    {       
            $data = $request->only($this->repo->getModel()->getFillable());
	    $data["user_id"] = JWTAuth::parseToken()->toUser()->id;   
    
            return $this->storeItem($data);
    }

    /**
     * Search sentences
     * 
     * Search sentences by their text
     * 
     * @param \App\Http\Controllers\StoreSentenceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function search(StoreSentenceRequest $request){
        $data = $request->only(array_keys($request->rules()));
        
        try {            
            return ApiResponse::Collection($this->repo->searchByText($data["text"]), $this->transformer);
        } catch (QueryException $e) {
            return ApiResponse::InternalError($e->getMessage());
        }        
    }
    
    /**
     * Update item 
     * 
     * Update the specified item in storage.
     *
     * @param  App\Http\Requests\UpdateSentenceRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSentenceRequest $request, $id)
    {
            $data = $request->only($this->repo->getModel()->getFillable());
	    $data["user_id"] = JWTAuth::parseToken()->toUser()->id;   
    
            return $this->updateItem($data, $id);
    }
    
    /**
     * Attach Category
     *
     * Attach the Category to existing resource.
     *
     * @param  App\Http\Requests\SentenceAttachCategoryRequest  $request
     * @param  int  $id
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function attachCategory(SentenceAttachCategoryRequest $request, $id, $category_id)
    {
            $data = $request->only(array_keys($request->rules()));
	    	
	    $model = $this->categoryRepo->find($category_id)->getModel();

            return ApiResponse::ItemAttached($this->repo->find($id)->attachCategory($model, $data)->getModel(), $this->transformer);
    }

    
    /**
     * Detach Category
     *
     * Detach the Category from existing resource.
     *
     * @param  App\Http\Requests\SentenceAttachCategoryRequest  $request
     * @param  int  $id
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function detachCategory($id, $category_id)
    {	    	
	$model = $this->categoryRepo->find($category_id)->getModel();
        return ApiResponse::ItemDetached($this->repo->find($id)->detachCategory($model)->getModel());
    }

}