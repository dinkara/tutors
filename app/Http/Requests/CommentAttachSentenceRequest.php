<?php

namespace App\Http\Requests;

use Dinkara\DinkoApi\Http\Requests\ApiRequest;
use App\Support\Enum\CommentsSentenceJoiners;

class CommentAttachSentenceRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
	return [
	    'order' => 'required',
	    'joiner' => 'required|in:'.CommentsSentenceJoiners::stringify(),

        ];
    }
}
