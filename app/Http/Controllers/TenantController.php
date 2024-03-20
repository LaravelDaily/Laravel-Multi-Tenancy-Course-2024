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
        return redirect()->route('dashboard');
    }
}
