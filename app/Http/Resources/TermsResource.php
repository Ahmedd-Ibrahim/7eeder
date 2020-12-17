<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TermsResource extends JsonResource
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
            'terms' =>[
                'en' => $this->getTranslation('term_desc', 'en'),
                'ar' => $this->getTranslation('term_desc', 'ar'),
            ]
        ];
    }
}
