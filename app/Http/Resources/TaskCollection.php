<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TaskCollection extends ResourceCollection {
    public function toArray($request)
    {
        $this -> collection ->transform(function ($tasks){
            return new TaskResource($tasks);
        });
        return parent::toArray($request);
    }
}
