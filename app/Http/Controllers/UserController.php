<?php

namespace App\Http\Controllers;

use App\Repositories\User\IUserRepo;
use App\Repositories\Profile\IProfileRepo;
use App\Transformers\UserTransformer;
use Tymon\JWTAuth\Facades\JWTAuth;
use Dinkara\DinkoApi\Http\Controllers\ResourceController;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Database\QueryException;
use ApiResponse;
use App\Http\Requests\UserAttachRoleRequest;
use App\Repositories\Role\IRoleRepo;
use App\Http\Requests\UserAttachSocialNetworkRequest;
use App\Repositories\SocialNetwork\ISocialNetworkRepo;


/**
 * @resource User
 */
class UserController extends ResourceController
{

    protected $profileRepo;
    /**
     * @var IRoleRepo 
     */
    private $roleRepo;
        /**
     * @var ISocialNetworkRepo 
     */
    private $socialNetworkRepo;
        
    
    public function __construct(IProfileRepo $profileRepo, IUserRepo $repo, UserTransformer $transformer, IRoleRepo $roleRepo, ISocialNetworkRepo $socialNetworkRepo) {
        parent::__construct($repo, $transformer);
	$this->profileRepo = $profileRepo;
        $this->middleware('exists.role:role_id,true', ['only' => ['attachRole', 'detachRole']]);

        $this->middleware('exists.socialnetwork:social_network_id,true', ['only' => ['attachSocialNetwork', 'detachSocialNetwork']]);

    
    	$this->roleRepo = $roleRepo;
	$this->socialNetworkRepo = $socialNetworkRepo;

    }    
    
    /**
     * Me
     * 
     * Display currently logged in user.
     *     
     * @return \Illuminate\Http\Response
     */
    public function me()
    {
        try {
            $user = JWTAuth::parseToken()->toUser();
            
            if($item = $this->repo->find($user->id)){

                return ApiResponse::Item($item->getModel(), new $this->transformer);
            }
        } catch (QueryException $e) {
            return ApiResponse::InternalError($e->getMessage());
        }    
        
        return ApiResponse::ItemNotFound($this->repo->getModel());
        
    }
    
    /**
     * Update profile
     * 
     * Update profile info.
     *
     * @param  App\Http\Requests\UpdateProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request)
    {       
            try {
                $user = JWTAuth::parseToken()->toUser();
                $data = $request->only(array_keys($request->rules()));
                if( $item = $this->profileRepo->find($user->profile->id)->update($data)){
                    //refresh user after update
                    return ApiResponse::ItemUpdated($this->repo->find($user->id)->getModel(), new $this->transformer, class_basename($this->repo->getModel()));
                }
            } catch (QueryException $e) {
                return ApiResponse::InternalError($e->getMessage());
            }
    }
    
    /**
     * Attach Role
     *
     * Attach the Role to existing User.
     *
     * @param  App\Http\Requests\UserAttachRoleRequest  $request
     * @param  int  $role_id
     * @return \Illuminate\Http\Response
     */
    public function attachRole(UserAttachRoleRequest $request, $role_id)
    {
            $data = $request->only(array_keys($request->rules()));

            $user = JWTAuth::parseToken()->toUser();
	    	
	    $model = $this->roleRepo->find($role_id)->getModel();

            return ApiResponse::ItemAttached($this->repo->find($user->id)->attachRole($model, $data)->getModel(), $this->transformer);
    }

        /**
     * Attach SocialNetwork
     *
     * Attach the SocialNetwork to existing User.
     *
     * @param  App\Http\Requests\UserAttachSocialNetworkRequest  $request
     * @param  int  $social_network_id
     * @return \Illuminate\Http\Response
     */
    public function attachSocialNetwork(UserAttachSocialNetworkRequest $request, $social_network_id)
    {
            $data = $request->only(array_keys($request->rules()));

            $user = JWTAuth::parseToken()->toUser();
	    	
	    $model = $this->socialNetworkRepo->find($social_network_id)->getModel();

            return ApiResponse::ItemAttached($this->repo->find($user->id)->attachSocialNetwork($model, $data)->getModel(), $this->transformer);
    }

    
    /**
     * Detach Role
     *
     * Detach the specified resource from existing resource.
     *
     * @param  App\Http\Requests\UserAttachRoleRequest  $request
     * @param  int  $role_id
     * @return \Illuminate\Http\Response
     */
    public function detachRole($role_id)
    {	    	
	$model = $this->roleRepo->find($role_id)->getModel();
        $user = JWTAuth::parseToken()->toUser();
        return ApiResponse::ItemDetached($this->repo->find($user->id)->detachRole($model)->getModel());
    }
    /**
     * Detach SocialNetwork
     *
     * Detach the specified resource from existing resource.
     *
     * @param  App\Http\Requests\UserAttachSocialNetworkRequest  $request
     * @param  int  $social_network_id
     * @return \Illuminate\Http\Response
     */
    public function detachSocialNetwork($social_network_id)
    {	    	
	$model = $this->socialNetworkRepo->find($social_network_id)->getModel();
        $user = JWTAuth::parseToken()->toUser();
        return ApiResponse::ItemDetached($this->repo->find($user->id)->detachSocialNetwork($model)->getModel());
    }

}