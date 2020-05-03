<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'name' => $this->name,
            'password' => $this->password,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'bio' => $this->bio,
            'phone' => $this->phone,
            'show_phone' => $this->show_phone,
            'show_email' => $this->show_email,
        ];
    }
}
