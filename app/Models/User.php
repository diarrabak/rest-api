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
        'email',
        'password',
        'first_name',
        'last_name',
        'role',
        'phone_number',
        'avatar',
        'researchgroup_id',
        'department_id',
        'academicgroup_id',
        'research_gate',
        'google_scholar',
        'linkedin',
        'facebook',
        'tweeter',
        'instagram',
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
    ];

    public function articles()
    {
        $this->hasMany(Article::class);
    }
    public function department()
    {
        $this->belongsTo(Department::class);
    }
    public function researchgroup()
    {
        $this->belongsTo(Researchgroup::class);
    }

    public function academicgroup()
    {
        $this->belongsTo(Academicgroup::class);
    }

    public function laboratory()
    {
        $this->hasMany(Laboratory::class);
    }
}
