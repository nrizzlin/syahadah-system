<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title','description', 'date', 'attachment', 'user_id'];


    protected $casts = [
        'date' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
