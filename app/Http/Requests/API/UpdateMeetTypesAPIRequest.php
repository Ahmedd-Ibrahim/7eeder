<?php

namespace App\Http\Requests\API;

use App\Models\MeetTypes;
use InfyOm\Generator\Request\APIRequest;

class UpdateMeetTypesAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     *
     */
    public function rules()
    {
        $rules = MeetTypes::$rules;
        $rules['slaughter_date'] = 'sometimes';
        $rules['age'] = 'sometimes';
        $rules['meet_type'] = 'sometimes';
        return $rules;
    }
}
