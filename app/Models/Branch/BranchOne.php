<?php

namespace App\Models\Branch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchOne extends Model
{
    use HasFactory;
    public $table = 'branch_ones';

    protected $fillable = [
        'order_id',
        'w_first_name',
        'w_familiy_name',
        'w_adress_parti',
        'w_grand_pere',
        'w_identity',
        'w_name_jobs',
        'w_niveau_etude',
        'w_note_parti',
        'w_pere',
        'w_sexe',
        'w_spacialite',
        'Type_Cat_3',
        'w_cycle_cat5'
    ];

    protected $dates = [
        'created_at',
        'updated_at',

    ];

    public function critrebranchones() {
        return $this->hasMany(CritreBranchOne::class, 'branch_one_id', 'id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
