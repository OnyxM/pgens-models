<?php

namespace PGens\SharedModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $fillable = ['name','email','password', 'phone', 'profile', 'school_type_id'];
    protected $hidden = ['password', 'remember_token', 'updated_at'];
    protected $casts = ['email_verified_at' => 'datetime'];
    protected $with = ['school_type'];

    public static function findByEmail($email)
    {
        return self::where('email', $email)->first();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function school_type()
    {
        return $this->belongsTo(SchoolType::class);
    }

    public function getProfileAttribute($profile)
    {
        return asset("uploads/profiles/".$profile);
    }
    public function setProfileAttribute($profile)
    {
        if(!is_null($profile)){
            $profileName = time(). '.' . $profile->getClientOriginalExtension();
            $profile->move('uploads/profiles', $profileName);
            $this->attributes['profile'] =$profileName;
        }
    }
}
