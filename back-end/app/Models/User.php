<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role->name,
            'points' => $this->points,
        ];
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

//    public function services()
//    {
//        return $this->belongsToMany(Service::class, 'role_user', 'role_id', 'user_id')
//                    ->where('roles.name', Role::WORKER);
//    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function rewards()
    {
        return $this->belongsToMany(Reward::class, 'user_reward')
                    ->withPivot('code')
                    ->withTimestamps();
    }
}
