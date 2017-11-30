<?php

namespace App\Http\Requests;

//use App\Models\{{model}};
use Dinkara\DinkoApi\Http\Requests\ApiRequest;
use App\Support\Enum\SupportTicketCategories;

class StoreSupportTicketRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
	    'title' => 'required',
	    'category' => 'required|in:'.SupportTicketCategories::stringify(),
	    'content' => 'required',

        ];
    }
}
