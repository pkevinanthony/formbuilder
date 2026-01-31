<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Form extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tenant_id', 'creator_id', 'title', 'slug', 'description', 'visibility',
        'properties', 'theme', 'settings', 'notifications', 'integrations',
        'closes_at', 'closed_text', 'submitted_text', 'redirect_url',
        'use_captcha', 'password', 'logo_picture', 'cover_picture', 'custom_code',
    ];

    protected $casts = [
        'properties' => 'array', 'settings' => 'array', 'notifications' => 'array',
        'integrations' => 'array', 'closes_at' => 'datetime', 'use_captcha' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(fn($form) => $form->slug = $form->slug ?? Str::random(12));
        static::addGlobalScope('tenant', fn(Builder $b) => ($t = app('current.tenant')) ? $b->where('forms.tenant_id', $t->id) : null);
    }

    public function tenant() { return $this->belongsTo(Tenant::class); }
    public function creator() { return $this->belongsTo(User::class, 'creator_id'); }
    public function submissions() { return $this->hasMany(FormSubmission::class); }
}
