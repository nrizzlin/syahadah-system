<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    use HasFactory;

    protected $fillable = ['title','description', 'attachment', 'user_id','category'];

    protected $casts = [
        'date' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
