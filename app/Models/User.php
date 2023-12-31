<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'wali_kelas',
        'status',
        'grade_1',
        'grade_2',
        'grade_3',
        'wali_kelas',
        'foto_guru',
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

    public function getGradesAttribute()
    {
        // Your logic to retrieve and format grades
        // This method should return the desired attribute value
       return [
            'grade_1' => $this->attributes['grade_1'],
            'grade_2' => $this->attributes['grade_2'],
            'grade_3' => $this->attributes['grade_3'],
            // Add other data as needed
        ];
    }

}



