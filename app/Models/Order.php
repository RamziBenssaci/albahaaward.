<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * App\Models\Slider
 * @method static \Illuminate\Database\Eloquent\Builder|Order active()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order UserHasOrderInSameSeason($userId, $contestId, $season)
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = ['contest_id', 'user_id', 'category_id', 'license_number', 'fromـnomination', 'project_title', 'description', 'file', 'description_notes', 'file_notes','user_id_2','user_id_3'];

    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('name_search')) {
            $q->whereHas('user', function ($query) use ($request) {
                $query->where('name', 'LIKE', "%{$request->name_search}%");
            });
        }

        if ($request->filled('active_search')) {
            if ($request->active_search == -1){
                $q;
            }else{
                $q->whereHas('contest', function ($query) use ($request) {
                    $query->where('category_id', $request->active_search);
                });
            }
        }

        if ($request->filled('type_of_type')) {
            if ($request->type_of_type == -1){
                $q;
            }else {
                $q->where('status', $request->type_of_type);
            }
        }

    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function branche()
    {
        return $this->hasOne(Branch\BranchOne::class, 'order_id');
    }

    public function contest()
    {
        return $this->belongsTo(Contest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeUserHasOrderInSameSeason($query, $userId, $contestId, $currentSeasonId)
    {
        return $query
            ->where('user_id', $userId)
//            ->where('contest_id', $contestId)
            ->whereHas('contest', function ($query) use ($currentSeasonId) {
                // Check if the contest's season_id matches the current season ID
                $query->where('season_id', $currentSeasonId);
            });
    }




    public function scopeActive($q)
    {
        $q->where('status', true);
    }
}
