<?php

namespace App\Http\Middleware;

use App\Models\Role\Role;
use Filament\Facades\Filament;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class RedirectIfNotFilamentAdmin extends Middleware
{
    /**
     * @param  array<string>  $guards
     */
    protected function authenticate($request, array $guards): void
    {
        $guard = Filament::auth();

        if (! $guard->check()) {
            $this->unauthenticated($request, $guards);

            return;
        }

        $this->auth->shouldUse(Filament::getAuthGuard());

        /** @var Model $user */
        $user = $guard->user();
        $role = Role::where('role_name', 'admin')->first();
        // Periksa apakah role_id pengguna tidak sama dengan 1
        if ($user->role_id !== $role->id) {
            // Logout user dan redirect ke login dengan pesan error
            $guard->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            $this->unauthenticated($request, $guards);
            return;
        }

        $panel = Filament::getCurrentPanel();

        // Cek akses FilamentUser dan lingkungan non-local
        abort_if(
            $user instanceof FilamentUser ?
                (! $user->canAccessPanel($panel)) : (config('app.env') !== 'local'),
            403,
        );
    }

    protected function redirectTo($request): ?string
    {
        return Filament::getLoginUrl();
    }
}
