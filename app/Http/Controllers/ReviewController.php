<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Repositories\Review\IReviewRepo;
use App\Transformers\ReviewTransformer;
use Tymon\JWTAuth\Facades\JWTAuth;
use Dinkara\DinkoApi\Http\Controllers\ResourceController;
use ApiResponse;
use App\Http\Requests\ReviewAttachSentenceRequest;
use App\Repositories\Sentence\ISentenceRepo;


/**
 * @resource Review
 */
class ReviewController extends ResourceController
{

    /**
     * @var ISentenceRepo 
     */
    private $sentenceRepo;
        
    
    public function __construct(IReviewRepo $repo, ReviewTransformer $transformer, ISentenceRepo $sentenceRepo) {
        parent::__construct($repo, $transformer);
	
        $this->middleware('owns.review', ['only' => ['update', 'destroy']]);

        $this->middleware('exists.review', ['only' => ['attachSentence', 'detachSentence']]);
    
        $this->middleware('exists.sentence:sentence_id,true', ['only' => ['attachSentence', 'detachSentence']]);

        $this->middleware('owns.review', ['only' => ['attachSentence', 'detachSentence']]);

    	$this->sentenceRepo = $sentenceRepo;

    }
    
    /**
     * Create item
     * 
     * Store a newly created item in storage.
     *
     * @param  App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request)
    {       
            $data = $request->only($this->repo->getModel()->getFillable());
	    $data["user_id"] = JWTAuth::parseToken()->toUser()->id;   
    
            return $this->storeItem($data);
    }

    /**
     * Update item 
     * 
     * Update the specified item in storage.
     *
     * @param  App\Http\Requests\UpdateReviewRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, $id)
    {
            $data = $request->only($this->repo->getModel()->getFillable());
	    $data["user_id"] = JWTAuth::parseToken()->toUser()->id;   
    
            return $this->updateItem($data, $id);
    }
    
    /**
     * Attach Sentence
     *
     * Attach the Sentence to existing resource.
     *
     * @param  App\Http\Requests\ReviewAttachSentenceRequest  $request
     * @param  int  $id
     * @param  int  $sentence_id
     * @return \Illuminate\Http\Response
     */
    public function attachSentence(ReviewAttachSentenceRequest $request, $id, $sentence_id)
    {
            $data = $request->only(array_keys($request->rules()));
	    	
	    $model = $this->sentenceRepo->find($sentence_id)->getModel();

            return ApiResponse::ItemAttached($this->repo->find($id)->attachSentence($model, $data)->getModel(), $this->transformer);
    }

    
    /**
     * Detach Sentence
     *
     * Detach the Sentence from existing resource.
     *
     * @param  App\Http\Requests\ReviewAttachSentenceRequest  $request
     * @param  int  $id
     * @param  int  $sentence_id
     * @return \Illuminate\Http\Response
     */
    public function detachSentence($id, $sentence_id)
    {	    	
	$model = $this->sentenceRepo->find($sentence_id)->getModel();
        return ApiResponse::ItemDetached($this->repo->find($id)->detachSentence($model)->getModel());
    }

}