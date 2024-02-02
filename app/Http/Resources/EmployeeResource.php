<?php

namespace App\Http\Resources;

use App\Models\Stage;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    private static $i = 1;
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
            'id' => self::$i++,
            'name' => @$this->name,
            'email' => @$this->email,
            'permission' => @$this->getRoleNames()->first() == 'web' ? 'admin' : @$this->getRoleNames(),
            'status' => @$status,
            'options' => @$options,
        ];
    }
}
