<?php

namespace App\Http\Resources;

use App\Constants\ENUM;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Resources\Json\JsonResource;

class OrdersResource extends JsonResource
{
    private static $i = 1;

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $status = $this->status == 1
            ? '<span class="badge badge-success">فعال</span>'
            : '<span class="badge badge-danger">غير فعال</span>';
        $options = view('panel.orders.sub._options', ['instance' => $this])->render();
        $statusOrder = view('panel.orders.sub._status', ['instance' => $this])->render();
        return [
            'id' => self::$i++,
            'category' => @$this->category->name,
            'season' => @$this->season->name,
            'start_date' => @$this->start_date,
            'end_date' => @$this->end_date,
            'status' => @$status,
            'statusOrder' => @$statusOrder,
            'options' => @$options,
        ];
    }
}
