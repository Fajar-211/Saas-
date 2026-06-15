<?php

namespace App\Http\Resources\Admin\Master\Division;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetDivisionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
