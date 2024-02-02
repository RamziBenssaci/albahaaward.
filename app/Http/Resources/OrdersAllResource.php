<?php

namespace App\Http\Resources;

use App\Constants\ENUM;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Resources\Json\JsonResource;

class OrdersAllResource extends JsonResource
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
        $options = view('panel.orders.sub._options_order', ['instance' => $this])->render();
        $statusOrder = view('panel.orders.sub._status_order', ['instance' => $this])->render();
        return [
            'id' => self::$i++,
            'category' => @$this->contest->category->name,
            'season' => @$this->contest->season->name,
            'user' => @$this->user->name,
            'date' => @$this->created_at->format('Y-m-d'), // Format the date as 'Y-m-d'
            'user_2' => @$this->user_id_2 ? User::query()->find(@$this->user_id_2)->name : 'لم يقيم بعد',
            'status' => @$status,
            'statusOrder' => @$statusOrder,
            'options' => @$options,
        ];
    }
}
