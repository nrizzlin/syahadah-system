<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Madu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'phone',
        'country',
        'city',
        'religion',
        'gender',
        'issue',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
