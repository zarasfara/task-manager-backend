<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'       => $this->id,
            'name'     => $this->name,
            'surname'  => $this->surname,
            'email'    => $this->email,
            'nickname' => $this->nickname,
            'avatar'   => $this->avatar,
            'roles'    => $this->getRoleNames(),
        ];
    }
}
