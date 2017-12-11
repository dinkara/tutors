<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Repositories\Student\IStudentRepo;
use App\Transformers\StudentTransformer;
use Tymon\JWTAuth\Facades\JWTAuth;
use Dinkara\DinkoApi\Http\Controllers\ResourceController;
use ApiResponse;
use App\Http\Requests\StudentAttachCommentRequest;
use App\Repositories\Comment\ICommentRepo;


/**
 * @resource Student
 */
class StudentController extends ResourceController
{

    /**
     * @var ICommentRepo 
     */
    private $commentRepo;
        
    
    public function __construct(IStudentRepo $repo, StudentTransformer $transformer, ICommentRepo $commentRepo) {
        parent::__construct($repo, $transformer);
	
        $this->middleware('owns.student', ['only' => ['update', 'destroy']]);

        $this->middleware('exists.student', ['only' => ['attachComment', 'detachComment']]);
    
        $this->middleware('exists.comment:review_id,true', ['only' => ['attachComment', 'detachComment']]);

        $this->middleware('owns.student', ['only' => ['attachComment', 'detachComment']]);

    	$this->commentRepo = $commentRepo;

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
     * Attach Comment
     *
     * Attach the Comment to existing resource.
     *
     * @param  App\Http\Requests\StudentAttachCommentRequest  $request
     * @param  int  $id
     * @param  int  $review_id
     * @return \Illuminate\Http\Response
     */
    public function attachComment(StudentAttachCommentRequest $request, $id, $review_id)
    {
            $data = $request->only(array_keys($request->rules()));
	    	
	    $model = $this->commentRepo->find($review_id)->getModel();

            return ApiResponse::ItemAttached($this->repo->find($id)->attachComment($model, $data)->getModel(), $this->transformer);
    }

    
    /**
     * Detach Comment
     *
     * Detach the Comment from existing resource.
     *
     * @param  App\Http\Requests\StudentAttachCommentRequest  $request
     * @param  int  $id
     * @param  int  $review_id
     * @return \Illuminate\Http\Response
     */
    public function detachComment($id, $review_id)
    {	    	
	$model = $this->commentRepo->find($review_id)->getModel();
        return ApiResponse::ItemDetached($this->repo->find($id)->detachComment($model)->getModel());
    }

}