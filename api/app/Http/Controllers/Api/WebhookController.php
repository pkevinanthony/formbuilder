<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController
{
    public function handleNMI(Request $request)
    {
        Log::info('NMI Webhook received', $request->all());

        $eventType = $request->input('event_type') ?? $request->input('action');

        match ($eventType) {
            'recurring.success', 'subscription.charge.success' => $this->handleSuccess($request),
            'recurring.failure', 'subscription.charge.failure' => $this->handleFailure($request),
            default => Log::info('Unhandled NMI event', ['type' => $eventType]),
        };

        return response('OK', 200);
    }

    protected function handleSuccess($request) { Log::info('Payment success', $request->all()); }
    protected function handleFailure($request) { Log::warning('Payment failed', $request->all()); }
}
