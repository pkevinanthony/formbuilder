<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Tenant;

class IdentifyTenant
{
    public function handle(Request $request, Closure $next)
    {
        $tenant = $this->resolveTenant($request);

        if (!$tenant && !$this->isCentralDomain($request)) {
            return response()->json(['error' => 'Tenant not found'], 404);
        }

        if ($tenant?->isSuspended()) {
            return response()->json(['error' => 'Tenant suspended'], 403);
        }

        if ($tenant) {
            app()->instance('current.tenant', $tenant);
            $request->merge(['tenant_id' => $tenant->id]);
        }

        return $next($request);
    }

    protected function resolveTenant(Request $request): ?Tenant
    {
        $host = $request->getHost();
        $central = config('tenancy.central_domain');

        // Custom domain
        if (!str_ends_with($host, '.' . $central) && $host !== $central) {
            return Tenant::where('custom_domain', $host)->first();
        }

        // Subdomain
        if (str_ends_with($host, '.' . $central)) {
            $subdomain = str_replace('.' . $central, '', $host);
            if (!in_array($subdomain, config('tenancy.reserved_subdomains', []))) {
                return Tenant::where('subdomain', $subdomain)->first();
            }
        }

        // Header
        if ($id = $request->header('X-Tenant-ID')) {
            return Tenant::where('uuid', $id)->first();
        }

        return null;
    }

    protected function isCentralDomain(Request $request): bool
    {
        return in_array($request->getHost(), config('tenancy.central_domains', []));
    }
}
