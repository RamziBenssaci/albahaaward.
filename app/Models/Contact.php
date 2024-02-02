<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * App\Models\Slider
 * @method static \Illuminate\Database\Eloquent\Builder|Contact currentLang()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact search(\Illuminate\Http\Request $request)
 * @mixin \Eloquent
 */

class Contact extends Model
{
    use HasFactory;

    const FILLABLE = ['category_id','description','is_reply','reply','user_id'];
    protected $fillable = self::FILLABLE;

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function replies()
    {
        return $this->hasMany(ContactReplie::class);
    }

    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('name_search')) {
            $q->where('name', 'LIKE', "%{$request->name_search}%");
        }
    }

    public function scopeCurrentLang($query)
    {
        return $query->whereHas('translations', function ($query) {
            $query->where('locale', app()->getLocale() ?? 'en');
        });
    }
}
