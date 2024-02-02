<?php

namespace App\Http\Resources;

use App\Models\Stage;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ContactResource extends JsonResource
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
        if (Auth::user()->userType !== 'user'){
            $options = view('panel.contacts.sub._options', ['instance' => $this])->render();
        }else{
            $options = 'لا يوجد اجراءات';
        }
        return [
            'id' => self::$i++,
            'name' => @$this->user->name ?? '-',
            'mobile' => @$this->user->phone ?? '-',
            'email' => @$this->user->email ?? '-',
            'category_id' => @$this->category_id !== -1 ? \App\Models\Category::query()->find(@$this->category_id)->name : 'اخرى',
            'status' => @$this->is_reply == 1 ? 'تم الرد' : 'لم يتم الرد بعد',
            'options' => @$options,
        ];
    }
}
