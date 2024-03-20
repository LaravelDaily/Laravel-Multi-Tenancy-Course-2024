<?php

namespace App\Http\Controllers;

class TenantController extends Controller
{
    public function __invoke($tenantId)
    {
        // Check tenant
        $tenant = auth()->user()->tenants()->findOrFail($tenantId);

        // Change tenant
        auth()->user()->update(['current_tenant_id' => $tenant->id]);

        // Redirect to dashboard
        $tenantDomain = str_replace('://', '://' . $tenant->subdomain . '.', config('app.url'));
        return redirect($tenantDomain . route('dashboard', absolute: false));
    }
}
