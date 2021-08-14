<?php

namespace App\Http\Resources\Review;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'user' => new UserResource($this->user),
            'review' => $this->body,
            'status' => $this->is_active = 0 ? "Inactive" : "Active"
        ];
        return parent::toArray($request);
    }
}
