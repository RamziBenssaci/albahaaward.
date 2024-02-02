<?php

namespace App\Http\Resources;

use App\Models\Stage;
use Illuminate\Http\Resources\Json\JsonResource;

class ContestsResource extends JsonResource
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
        $status = view('panel.contests.sub._status', ['instance' => $this])->render();
        $options = view('panel.contests.sub._options', ['instance' => $this])->render();
        return [
            'id' => self::$i++,
            'user' => @$this->user->name,
            'category' => @$this->category->name,
            'season' => @$this->season->name,
            'start_date' => @$this->start_date,
            'end_date' => @$this->end_date,
            'status' => @$status,
            'options' => @$options,
        ];
    }
}
