<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    public function index(): View
    {
        $invitations = Invitation::where('tenant_id', auth()->user()->current_tenant_id)->latest()->get();

        return view('users.index', compact('invitations'));
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $invitation = Invitation::create([
            'tenant_id' => auth()->user()->current_tenant_id,
            'email' => $request->input('email'),
            'token' => Str::random(32),
        ]);

        return redirect()->route('users.index');
    }
}
