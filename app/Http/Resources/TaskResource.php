<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class  TaskResource extends JsonResource{
    public function toArray($request)
    {
        /**
         * Transform the resource into an array.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return array
         */
        return [
            'id' => $this -> id,
            'title' => $this -> title,
            'description' => $this -> description,
        ];
    }
}
