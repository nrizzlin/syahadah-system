<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluatedMualaf extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'performance', 'note', 'result_status', 'assigned_id'];

    public function assignedMualaf()
    {
        return $this->belongsTo(AssignedMualaf::class, 'assigned_id');
    }
}
