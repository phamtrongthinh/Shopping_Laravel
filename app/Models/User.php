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
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role',
        'province',
        'district', // Kiểm tra quận/huyện
        'ward', // Kiểm tra xã/phường
        'status'
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
    // Khai báo mối quan hệ likes (User has many Likes)
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
    public function provinceRelation()
    {
        return $this->belongsTo(Province::class, 'province');
    }
    public function districtRelation()
    {
        return $this->belongsTo(District::class, 'district');
    }
    public function wardRelation()
    {
        return $this->belongsTo(Ward::class, 'ward');
    }
}
