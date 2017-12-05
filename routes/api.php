<?php

use Illuminate\Http\Request;

//Default auth routes
Route::post('login', 'Auth\AuthController@login');
Route::post('auth/facebook', 'Auth\AuthController@facebookAuth');
Route::post('auth/google', 'Auth\AuthController@googleAuth');
Route::post('register', 'Auth\AuthController@register');
Route::post('forgot/password', 'Auth\ForgotPasswordController@forgot');
Route::get('email/confirmation/{confirmation_code}', 'Auth\AuthController@confirmEmail');
Route::post('password/reset', 'Auth\ForgotPasswordController@resetPassword');


Route::middleware(['dinkoapi.auth', 'user.check.status'])->group(function (){
    Route::get('token/refresh', 'Auth\AuthController@getToken');
    Route::post('logout', 'Auth\AuthController@logout');    
    
    /*==================================
	CategoryController route section
      ==================================*/
    Route::group(['prefix' => 'categories'], function(){
	Route::get('paginate', 'CategoryController@paginate');


    });   

    Route::apiResource('categories', 'CategoryController', [
	'parameters' => [
	    'categories' => 'id'
	]
    ]);

    /*==================================
	End CategoryController route section
      ==================================*/
    
    /*==================================
	CommentController route section
      ==================================*/
    Route::group(['prefix' => 'comments'], function(){
	Route::get('paginate', 'CommentController@paginate');
        Route::post('{id}/sentences', 'CommentController@attachSentences');
	Route::post('{id}/sentences/{sentence_id}', 'CommentController@attachSentence');

	Route::delete('{id}/sentences/{sentence_id}', 'CommentController@detachSentence');

    });   

    Route::apiResource('comments', 'CommentController', [
	'parameters' => [
	    'comments' => 'id'
	]
    ]);

    /*==================================
	End CommentController route section
      ==================================*/
    
    /*==================================
	SentenceController route section
      ==================================*/
    Route::group(['prefix' => 'sentences'], function(){
	Route::get('paginate', 'SentenceController@paginate');
        Route::post('search', 'SentenceController@search');
	Route::post('{id}/categories/{category_id}', 'SentenceController@attachCategory');

	Route::delete('{id}/categories/{category_id}', 'SentenceController@detachCategory');

    });   

    Route::apiResource('sentences', 'SentenceController', [
	'parameters' => [
	    'sentences' => 'id'
	]
    ]);

    /*==================================
	End SentenceController route section
      ==================================*/
    
    /*==================================
	StudentController route section
      ==================================*/
    Route::group(['prefix' => 'students'], function(){
	Route::get('paginate', 'StudentController@paginate');
	Route::post('{id}/comments/{review_id}', 'StudentController@attachComment');

	Route::delete('{id}/comments/{review_id}', 'StudentController@detachComment');

    });   

    Route::apiResource('students', 'StudentController', [
	'parameters' => [
	    'students' => 'id'
	]
    ]);

    /*==================================
	End StudentController route section
      ==================================*/
    
    /*==================================
	SupportTicketController route section
      ==================================*/
    Route::group(['prefix' => 'supportTickets'], function(){
	Route::get('paginate', 'SupportTicketController@paginate');


    });   

    Route::apiResource('supportTickets', 'SupportTicketController', [
	'parameters' => [
	    'supportTickets' => 'id'
	]
    ]);

    /*==================================
	End SupportTicketController route section
      ==================================*/
    
    /*==================================
	UserController route section
      ==================================*/
    Route::group(['prefix' => 'users'], function(){
        Route::get("/me", 'UserController@me');
        Route::put("/", 'UserController@update');
//	Route::post('roles/{role_id}', 'UserController@attachRole');
//	Route::post('socialNetworks/{social_network_id}', 'UserController@attachSocialNetwork');
//
//	Route::delete('roles/{role_id}', 'UserController@detachRole');
//	Route::delete('socialNetworks/{social_network_id}', 'UserController@detachSocialNetwork');

    });

    /*==================================
	End UserController route section
      ==================================*/


});

