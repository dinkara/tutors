<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupportTicketRequest;
use App\Http\Requests\UpdateSupportTicketRequest;
use App\Repositories\SupportTicket\ISupportTicketRepo;
use App\Transformers\SupportTicketTransformer;
use Tymon\JWTAuth\Facades\JWTAuth;
use Dinkara\DinkoApi\Http\Controllers\ResourceController;
use ApiResponse;


/**
 * @resource SupportTicket
 */
class SupportTicketController extends ResourceController
{

    
    
    public function __construct(ISupportTicketRepo $repo, SupportTicketTransformer $transformer) {
        parent::__construct($repo, $transformer);
	
        $this->middleware('owns.supportticket', ['only' => ['update', 'destroy']]);

    
    
    }
    
    /**
     * Create item
     * 
     * Store a newly created item in storage.
     *
     * @param  App\Http\Requests\StoreSupportTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupportTicketRequest $request)
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
     * @param  App\Http\Requests\UpdateSupportTicketRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupportTicketRequest $request, $id)
    {
            $data = $request->only($this->repo->getModel()->getFillable());
	    $data["user_id"] = JWTAuth::parseToken()->toUser()->id;   
    
            return $this->updateItem($data, $id);
    }
    


}