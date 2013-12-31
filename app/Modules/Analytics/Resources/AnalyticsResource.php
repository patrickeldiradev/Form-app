<?php

namespace App\Modules\Analytics\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnalyticsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'endpoint'  => $this->getPath(),
            'method'  => $this->getMethod(),
            'count'  => $this->getHits(),
        ];
    }
}
