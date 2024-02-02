<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{

    public function toArray($request)
    {
        $options = view('dashboard.admin.employees.permissions.sub._options', ['instance' => $this])->render();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i A'),
            'options' => $options,
        ];
    }


    public static function toFilter($resource)
    {
        return $resource->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name
            ];
        });
    }
}
