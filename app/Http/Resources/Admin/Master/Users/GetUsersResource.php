<?php

namespace App\Http\Resources\Admin\Master\Users;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class GetUsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'pict' => $this->profile,
            'name' => $this->first_name === Auth::user()->first_name ? 'You' : $this->first_name,
            'division' => $this->division->name,
            'level' => $this->division->level->level,
            'join' => $this->created_at,
            'status' => $this->last_activity >= now()->subMinute(5) ? true : false
        ];
    }
}
