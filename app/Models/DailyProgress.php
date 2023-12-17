<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyProgress extends Model
{

    use HasFactory;

    protected $fillable = ['title','description', 'date', 'place', 'status', 'attachment', 'question_topic', 'question_desc', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
