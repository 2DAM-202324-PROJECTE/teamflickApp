<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'foto_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
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
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function conversations()
    {

        return $this->hasMany(Conversation::class, 'sender_id')->orWhere('receiver_id', $this->id);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function xats()
    {
        return $this->belongsToMany(Xat::class, 'user_xat', 'user_id', 'xat_id');
    }

    public function xatsCreats()
    {
        return $this->hasMany(Xat::class);
    }

    public function Role ()
    {
        return $this->belongsTo(Role::class);
    }

    public function foto()
    {
        return $this->belongsTo(Foto::class);
    }

    // Això és el mètode que permet als usuaris veure els vídeos
    public function hasPermissionToAccessVideo($filename)
    {
        return true;
    }
}
