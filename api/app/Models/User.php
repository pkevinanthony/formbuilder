<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'avatar', 'settings', 'is_super_admin'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed', 'settings' => 'array', 'is_super_admin' => 'boolean'];

    public function tenants() { return $this->belongsToMany(Tenant::class, 'tenant_users')->withPivot(['role', 'permissions'])->withTimestamps(); }
    public function isSuperAdmin(): bool { return $this->is_super_admin === true; }
    public function currentTenant(): ?Tenant { return app('current.tenant'); }
}
