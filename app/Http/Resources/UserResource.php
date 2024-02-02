<?php

namespace App\Http\Resources;

use App\Models\Stage;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $status = view('panel.users.sub._status', ['instance' => $this])->render();
        $options = view('panel.users.sub._options', ['instance' => $this])->render();
        return [
            'id' => @$this->id,
            'name' => @$this->name ?? '-',
            'email' => @$this->email ?? '-',
            'ssn' => @$this->ssn ?? '-',
            'gender' => @$this->gender ?? '-',
            'phone' => @$this->phone ?? '-',
            'section' => @$this->section ?? '-',
            'image' => '<div class="symbol symbol-45px me-5"> <img alt="Pic" src="' . ($this->image !== null ? asset('public/images/' . $this->image) : asset('/public/assets/panel/media/avatars/blank.png')) . '"></div>',
            'status' => @$status,
            'options' => @$options,
        ];
    }
}
