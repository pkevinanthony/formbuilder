<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Tenant extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uuid', 'name', 'slug', 'subdomain', 'custom_domain',
        'settings', 'branding', 'status', 'trial_ends_at', 'nmi_customer_vault_id',
    ];

    protected $casts = [
        'settings' => 'array',
        'branding' => 'array',
        'trial_ends_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($tenant) {
            $tenant->uuid = $tenant->uuid ?? (string) Str::uuid();
            $tenant->slug = $tenant->slug ?? Str::slug($tenant->name);
            $tenant->subdomain = $tenant->subdomain ?? $tenant->slug;
        });
    }

    public function users() { return $this->belongsToMany(User::class, 'tenant_users')->withPivot(['role', 'permissions'])->withTimestamps(); }
    public function forms() { return $this->hasMany(Form::class); }
    public function subscriptions() { return $this->hasMany(TenantSubscription::class); }
    public function activeSubscription() { return $this->subscriptions()->whereIn('status', ['active', 'trialing'])->latest()->first(); }
    public function isTrialing(): bool { return $this->status === 'trial' && $this->trial_ends_at?->isFuture(); }
    public function isActive(): bool { return $this->status === 'active' || $this->isTrialing(); }
    public function isSuspended(): bool { return $this->status === 'suspended'; }
    public function getFullDomainAttribute(): string { return $this->custom_domain ?? $this->subdomain . '.' . config('tenancy.central_domain'); }
    public function getPlanFeatures(): array { return $this->activeSubscription() ? config("pricing.plans.{$this->activeSubscription()->plan}.features", []) : config('pricing.plans.free.features', []); }
    public function hasFeature(string $feature): bool { $f = $this->getPlanFeatures(); return isset($f[$feature]) && $f[$feature]; }
}
