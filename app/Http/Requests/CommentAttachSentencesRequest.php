<?php

namespace App\Http\Requests;

use Dinkara\DinkoApi\Http\Requests\ApiRequest;
use App\Support\Enum\CommentsSentenceJoiners;

class CommentAttachSentencesRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {        
	return [
            
	    'sentences.*.order' => 'required',
	    'sentences.*.joiner' => 'nullable|in:'.CommentsSentenceJoiners::stringify(),
        ];
    }
}
