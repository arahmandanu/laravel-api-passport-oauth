<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ResponsePagination extends ResourceCollection
{
    /**
     * Transform the resources collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            parent::toArray($this->collection),
            new Pagination($this),
        ];
    }
}
