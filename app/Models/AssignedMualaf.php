<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedMualaf extends Model
{
    use HasFactory;

    protected $table = 'assigned_mualaf';

    protected $fillable = [
        'mentor_id',
        'mualaf_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Define the relationship with the User model for mentor
    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    // Define the relationship with the User model for mualaf
    public function mualaf()
    {
        return $this->belongsTo(User::class, 'mualaf_id');
    }

        public function evaluations()
    {
        return $this->hasMany(EvaluatedMualaf::class, 'assigned_id','id');
    }
    
    public function mentors()
{
    return $this->belongsToMany(User::class, 'assigned_mualaf', 'mualaf_id', 'mentor_id');
}

}
