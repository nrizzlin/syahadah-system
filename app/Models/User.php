<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Specialist;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'usertype', 'specialist_id', 'gender', 'age', 'country',
        'city', 'phone_number', 'previous_religion', 'syahadah_date',
        'facebook_page', 'status', 'password','last_seen','attachment',
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

    public function progressdaily()
    {
        return $this->hasMany(DailyProgress::class);
    }

    // mentors relationship
    public function mentors()
    {
        return $this->belongsToMany(User::class, 'assigned_mualaf', 'mualaf_id', 'mentor_id')
            ->withTimestamps();
    }

    // mualafs relationship
    public function mualafs()
    {
        return $this->belongsToMany(User::class, 'assigned_mualaf', 'mentor_id', 'mualaf_id')
            ->withTimestamps();
    }

    public function specialist()
    {
        return $this->belongsTo(Specialist::class, 'specialist_id');
    }

    public function madu()
    {
        return $this->hasMany(Madu::class);
    }
}
