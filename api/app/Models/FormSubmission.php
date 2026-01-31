<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FormSubmission extends Model
{
    protected $fillable = ['form_id', 'public_id', 'data', 'metadata', 'completion_time', 'status', 'ip_address', 'user_agent'];
    protected $casts = ['data' => 'array', 'metadata' => 'array', 'completion_time' => 'integer'];

    protected static function boot()
    {
        parent::boot();
        static::creating(fn($s) => $s->public_id = $s->public_id ?? Str::uuid()->toString());
    }

    public function form() { return $this->belongsTo(Form::class); }
}
