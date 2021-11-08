<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * @var string[]
     */
    protected $fillable = [
        'FIO',
        'login',
        'email',
        'password_hash',
        'birthday_date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function info(){
        return $this->hasOne(AdditionalInformation::class);
    }

    public function files(){
        return $this->hasMany(File::class);
    }

    /**
     * После добавления этого начала работать авторизация
     * @return mixed|string
     */
    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    /**
     * Take from FIO first and second name
     * @return string
     */
    public function SFname(){
        $FIO = $this->FIO;

        $pieces = explode(" ", $FIO);
        if (sizeof($pieces) > 1)
            $result = $pieces[0] . ' ' . $pieces[1];
        else
            $result = $pieces[0];
        return $result;
    }
}
