<?php

namespace App\Http\Resources\Review;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReviewCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return parent::toArray($request);
        return [
            // // 'user' => new UserResource($this->user),
            'body' => $this->body,
            'status' => $this->is_active = 0 ? "Inactive" : "Active"
        ];
    }
}
