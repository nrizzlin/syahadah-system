<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'usertype',
        'gender',
        'age',
        'country',
        'city',
        'phone_number',
        'previous_religion',
        'syahadah_date',
        'facebook_page',
        'status',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function resources()
    {
        return $this->hasMany(Resources::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

        /**
     * Get the user's type.
     *
     * @return string
     */
    public function userType()
    {
        return $this->usertype; // Return the 'usertype' field from the database
    }
}
