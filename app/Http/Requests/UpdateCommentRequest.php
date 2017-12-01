<?php

namespace App\Http\Requests;

//use App\Models\{{model}};
use Dinkara\DinkoApi\Http\Requests\ApiRequest;

class UpdateCommentRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
	    'text' => 'required',
	    'caption' => 'required',
	    'favorite' => 'required',
	    'score' => 'required',
	    'count' => 'required',

        ];
    }
}
