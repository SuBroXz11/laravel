<?php

namespace App\Models;

use App\Models\Listing;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Concerns\IsFilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Filament\Models\Concerns\SendsFilamentPasswordResetNotification;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, IsFilamentUser, SendsFilamentPasswordResetNotification;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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
    ];

    public static $filamentAdminColumn = 'is_filament_admin';
    public static $filamentRolesColumn = 'filament_roles';

    // Relationship with Listings
    public function listings(){
        return $this->hasMany(Listing::class, 'user_id');
    }

    // preventing all users from ascessing the filament
    public function canAccessFilament()
{
    return $this->group === 'Filament Users';
}
}
