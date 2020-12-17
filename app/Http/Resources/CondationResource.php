<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CondationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'condation' =>[
                'en' => $this->getTranslation('condation_desc', 'en'),
                'ar' => $this->getTranslation('condation_desc', 'ar'),
            ]
        ];
    }
}
