<?php

namespace App\Http\Requests\API;

use App\Models\Store;
use InfyOm\Generator\Request\APIRequest;

class UpdateStoreAPIRequest extends APIRequest
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
        $rules = Store::$rules;
        $rules['name'] = 'sometimes';
        $rules['phone'] = 'sometimes';
        $rules['address'] = 'sometimes';
        $rules['active'] = 'sometimes';
        $rules['image'] = 'sometimes';
        return $rules;
    }
}
