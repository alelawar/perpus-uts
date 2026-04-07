<?php

namespace App\Http\Responses;

use Filament\Auth\Http\Responses\Contracts\LoginResponse as ContractsLoginResponse;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class LoginResponse implements ContractsLoginResponse
{
    public function toResponse($request): RedirectResponse|Redirector
    {
        // Example: Redirect users to a specific resource index
        return redirect()->to('/');

        // Or use the intended URL if it exists
        // return redirect()->intended(filament()->getUrl());
    }
}
