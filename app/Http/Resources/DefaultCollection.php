<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DefaultCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'current_page' => $this->currentPage(),
                'total_pages' => $this->lastPage(),
                'per_page' => $this->perPage(),
                'total' => $this->total(),
            ],
            'links' => [
                'prev' => $this->previousPageUrl(),
                'next' => $this->nextPageUrl()
            ]
        ];
    }
}
