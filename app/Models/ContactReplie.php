<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Slider
 * @method static \Illuminate\Database\Eloquent\Builder|ContactReplie currentLang()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactReplie query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactReplie search(\Illuminate\Http\Request $request)
 * @mixin \Eloquent
 */

class ContactReplie extends Model
{
    use HasFactory;

    const FILLABLE = ['reply','contact_id','user_id'];
    protected $fillable = self::FILLABLE;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

}
