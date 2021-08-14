<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    // public $preserveKeys = true;
    public function toArray($request)
    {
        // return [
        //     'name' => ucwords($this->title),
        //     'status' => $this->status == 0 ? 'Inactive' : 'Active',
        //     'view' => $this->viewCalculator($this->view),
        //     // 'products' => $this->collection,
        //     'links' => [
        //         'self' => 'link-value',
        //     ],
        // ];

        return [
            'products' => ProductResources::collection($this->collection)
        ];
    }

    // public function with($request)
    // {
    //     return [
    //         'code' => 200,
    //         'status' => 'success',
    //         'message' => 'Data retrieve Successfully!'
    //     ];
    // }
}
