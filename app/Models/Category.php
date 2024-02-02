<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * App\Models\Slider
 * @method static \Illuminate\Database\Eloquent\Builder|Category active()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory;
    const FILLABLE = ['name', 'status'];
    protected $fillable = self::FILLABLE;

    public function scopeActive($q)
    {
        $q->where('status', true);
    }

    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('name_search')) {
            $q->where('name', "%{$request->name_search}%");
        }
    }
}
