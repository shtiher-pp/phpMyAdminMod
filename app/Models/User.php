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

    public const GENDER_MALE = 1;
    public const GENDER_FEMALE =2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//        'surname',
//        'patronymic',
//        'age',
//        'address',
//        'gender',
//    ];

    protected $guarded = false;
    protected $table = 'users';

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

    public static function getGenders()
    {
        return [
            static::GENDER_MALE => 'Мужской',
            static::GENDER_FEMALE => 'Женский'
        ];
    }

    public function getGenderTitleAttribute()
    {
        return static::getGenders()[$this->gender];
    }

    public function getFullNameAttribute()
    {
        return $this->surname . ' ' . $this->name . ' ' . $this->patronymic;
    }
}
