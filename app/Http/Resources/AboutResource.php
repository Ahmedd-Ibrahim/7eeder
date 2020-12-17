<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'about' => [
                'en' => $this->getTranslation('about', 'en'),
                'ar' => $this->getTranslation('about', 'ar'),
            ],
        ];
    }
}
