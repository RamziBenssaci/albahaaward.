<?php

namespace App\Models\Branch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CritreBranchOne extends Model
{
    use HasFactory;

    public $table = 'critre_branch_ones';

    protected $fillable = [
        'branch_one_id',
        'name',
        'indice',
        'justif',
        'file_path',
        'file_ext',
        'file_title'
    ];

    protected $dates = [
        'created_at',
        'updated_at',

    ];

    public function branchone() {
    	return $this->belongsTo(BranchOne::class, 'branch_one_id');
    }
}
