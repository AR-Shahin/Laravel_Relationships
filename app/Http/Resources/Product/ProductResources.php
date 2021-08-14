<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Review\ReviewCollection;
use App\Http\Resources\Review\ReviewResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResources extends JsonResource
{

    public static $wrap = 'product';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => ucwords($this->title),
            'status' => $this->status == 0 ? 'Inactive' : 'Active',
            'view' => $this->viewCalculator($this->view),
            'additional' => [
                'demo1' => 'demo additional one',
                'demo2' => 'demo additional two',
            ],
            // 'route' => route('dashboard'),
            //'user' => new UserResource($this->user),
            // 'reviews' =>  ReviewResource::collection($this->whenLoaded('reviews')),
            'reviews' => new ReviewCollection($this->reviews),
            // 'keywords' => $this->keywords
        ];
    }


    protected function viewCalculator($view): string
    {
        if ($view < 20) {
            return 'New';
        }
        if ($view < 40) {
            return '4o';
        }
        if ($view < 60) {
            return 'Between 60';
        }
        if ($view < 100) {
            return 'Popular';
        }
    }
}
