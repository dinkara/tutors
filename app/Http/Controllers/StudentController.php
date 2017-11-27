<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Repositories\Student\IStudentRepo;
use App\Transformers\StudentTransformer;
use Tymon\JWTAuth\Facades\JWTAuth;
use Dinkara\DinkoApi\Http\Controllers\ResourceController;
use ApiResponse;
use App\Http\Requests\StudentAttachReviewRequest;
use App\Repositories\Review\IReviewRepo;


/**
 * @resource Student
 */
class StudentController extends ResourceController
{

    /**
     * @var IReviewRepo 
     */
    private $reviewRepo;
        
    
    public function __construct(IStudentRepo $repo, StudentTransformer $transformer, IReviewRepo $reviewRepo) {
        parent::__construct($repo, $transformer);
	
        $this->middleware('owns.student', ['only' => ['update', 'destroy']]);

        $this->middleware('exists.student', ['only' => ['attachReview', 'detachReview']]);
    
        $this->middleware('exists.review:review_id,true', ['only' => ['attachReview', 'detachReview']]);

        $this->middleware('owns.student', ['only' => ['attachReview', 'detachReview']]);

    	$this->reviewRepo = $reviewRepo;

    }
    
    /**
     * Create item
     * 
     * Store a newly created item in storage.
     *
     * @param  App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
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
     * @param  App\Http\Requests\UpdateStudentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, $id)
    {
            $data = $request->only($this->repo->getModel()->getFillable());
	    $data["user_id"] = JWTAuth::parseToken()->toUser()->id;   
    
            return $this->updateItem($data, $id);
    }
    
    /**
     * Attach Review
     *
     * Attach the Review to existing resource.
     *
     * @param  App\Http\Requests\StudentAttachReviewRequest  $request
     * @param  int  $id
     * @param  int  $review_id
     * @return \Illuminate\Http\Response
     */
    public function attachReview(StudentAttachReviewRequest $request, $id, $review_id)
    {
            $data = $request->only(array_keys($request->rules()));
	    	
	    $model = $this->reviewRepo->find($review_id)->getModel();

            return ApiResponse::ItemAttached($this->repo->find($id)->attachReview($model, $data)->getModel(), $this->transformer);
    }

    
    /**
     * Detach Review
     *
     * Detach the Review from existing resource.
     *
     * @param  App\Http\Requests\StudentAttachReviewRequest  $request
     * @param  int  $id
     * @param  int  $review_id
     * @return \Illuminate\Http\Response
     */
    public function detachReview($id, $review_id)
    {	    	
	$model = $this->reviewRepo->find($review_id)->getModel();
        return ApiResponse::ItemDetached($this->repo->find($id)->detachReview($model)->getModel());
    }

}