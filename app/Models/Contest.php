<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * App\Models\Slider
 * @method static \Illuminate\Database\Eloquent\Builder|Contest active()
 * @method static \Illuminate\Database\Eloquent\Builder|Contest query()
 * @mixin \Eloquent
 */
class Contest extends Model
{
    use HasFactory;
    const FILLABLE = ['category_id','start_date','end_date','user_id', 'status','season_id'];
    protected $fillable = self::FILLABLE;
    protected $table = 'contests';
    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('name_search')) {
            $q->whereHas('category', function ($query) use ($request) {
                $query->where('name', 'LIKE', "%{$request->name_search}%");
            });
        }
    }

    public function scopeActive($q)
    {
        $q->where('status', true);
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function season()
    {
        return $this->belongsTo(Season::class,'season_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function order()
    {
        return $this->hasOne(Order::class)->where('user_id',auth()->id());
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
