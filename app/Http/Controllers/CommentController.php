<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Repositories\Comment\ICommentRepo;
use App\Transformers\CommentTransformer;
use Tymon\JWTAuth\Facades\JWTAuth;
use Dinkara\DinkoApi\Http\Controllers\ResourceController;
use ApiResponse;
use App\Http\Requests\CommentAttachSentenceRequest;
use App\Http\Requests\CommentAttachSentencesRequest;
use App\Repositories\Sentence\ISentenceRepo;


/**
 * @resource Comment
 */
class CommentController extends ResourceController
{

    /**
     * @var ISentenceRepo 
     */
    private $sentenceRepo;
        
    
    public function __construct(ICommentRepo $repo, CommentTransformer $transformer, ISentenceRepo $sentenceRepo) {
        parent::__construct($repo, $transformer);
	
        $this->middleware('owns.comment', ['only' => ['update', 'destroy']]);

        $this->middleware('exists.comment', ['only' => ['attachSentence', 'detachSentence']]);
    
        $this->middleware('exists.sentence:sentence_id,true', ['only' => ['attachSentence', 'detachSentence']]);

        $this->middleware('owns.comment', ['only' => ['attachSentence', 'detachSentence']]);

    	$this->sentenceRepo = $sentenceRepo;

    }
    
    /**
     * Create item
     * 
     * Store a newly created item in storage.
     *
     * @param  App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
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
     * @param  App\Http\Requests\UpdateCommentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, $id)
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
     * @param  App\Http\Requests\CommentAttachSentenceRequest  $request
     * @param  int  $id
     * @param  int  $sentence_id
     * @return \Illuminate\Http\Response
     */
    public function attachSentence(CommentAttachSentenceRequest $request, $id, $sentence_id)
    {
            $data = $request->only(array_keys($request->rules()));
	    	
	    $model = $this->sentenceRepo->find($sentence_id)->getModel();

            return ApiResponse::ItemAttached($this->repo->find($id)->attachSentence($model, $data)->getModel(), $this->transformer);
    }

    
     /**
     * Attach Multiple Sentences
     *
     * Attach multiple sentences to existing resource.
     *
     * @param  App\Http\Requests\ReviewAttachSentenceRequest  $request
     * @param  int  $id     
     * @return \Illuminate\Http\Response
     */
    public function attachSentences(CommentAttachSentencesRequest $request, $id)
    {
            $data = $request->only("sentences");
	    	            
            $review = $this->repo->find($id);
            
            foreach($data["sentences"] as $sentence){                
                $model = $this->sentenceRepo->find($sentence["id"])->getModel();
                unset($sentence["id"]);
                $review->attachSentence($model, $sentence);
            }	    
            
            return ApiResponse::ItemAttached($review->getModel(), $this->transformer);
    }
    
    /**
     * Detach Sentence
     *
     * Detach the Sentence from existing resource.
     *
     * @param  App\Http\Requests\CommentAttachSentenceRequest  $request
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