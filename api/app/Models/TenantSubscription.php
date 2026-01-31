<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TenantSubscription extends Model
{
    protected $fillable = [
        'tenant_id', 'plan', 'status', 'nmi_subscription_id', 'nmi_customer_vault_id',
        'billing_cycle', 'amount', 'currency', 'current_period_start', 'current_period_end',
        'canceled_at', 'cancel_reason', 'metadata',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'current_period_start' => 'datetime',
        'current_period_end' => 'datetime',
        'canceled_at' => 'datetime',
        'metadata' => 'array',
    ];

    const STATUS_ACTIVE = 'active';
    const STATUS_TRIALING = 'trialing';
    const STATUS_PAST_DUE = 'past_due';
    const STATUS_CANCELED = 'canceled';

    public function tenant() { return $this->belongsTo(Tenant::class); }
    public function isActive(): bool { return $this->status === self::STATUS_ACTIVE; }
    public function isValid(): bool { return in_array($this->status, [self::STATUS_ACTIVE, self::STATUS_TRIALING]); }
    public function cancel(string $reason = null): self { $this->update(['status' => self::STATUS_CANCELED, 'canceled_at' => now(), 'cancel_reason' => $reason]); return $this; }
    public function renew(): self { $this->update(['current_period_start' => now(), 'current_period_end' => $this->billing_cycle === 'yearly' ? now()->addYear() : now()->addMonth(), 'status' => self::STATUS_ACTIVE]); return $this; }
}
