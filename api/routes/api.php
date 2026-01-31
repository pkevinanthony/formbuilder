<?php

use Illuminate\Support\Facades\Route;

// Health check
Route::get('/health', fn() => response()->json(['status' => 'ok', 'timestamp' => now()]));

// Public routes
Route::get('/billing/plans', fn() => response()->json(['plans' => config('pricing.plans'), 'currency' => config('pricing.currency')]));
Route::get('/billing/tokenization-key', fn() => response()->json(['tokenization_key' => config('nmi.tokenization_key')]));

// NMI webhook
Route::post('/webhooks/nmi', [\App\Http\Controllers\Api\WebhookController::class, 'handleNMI']);

// Authenticated routes
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', fn() => auth()->user());

    Route::middleware(['identify.tenant'])->group(function () {
        Route::get('/tenant', fn() => response()->json(['tenant' => app('current.tenant')]));
        Route::get('/billing/current', fn() => response()->json(['subscription' => app('current.tenant')?->activeSubscription()]));
    });
});

// Admin routes
Route::prefix('admin')->middleware(['auth:sanctum', 'super.admin'])->group(function () {
    Route::get('/statistics', fn() => response()->json([
        'total_tenants' => \App\Models\Tenant::count(),
        'active_tenants' => \App\Models\Tenant::where('status', 'active')->count(),
        'trial_tenants' => \App\Models\Tenant::where('status', 'trial')->count(),
    ]));
});
