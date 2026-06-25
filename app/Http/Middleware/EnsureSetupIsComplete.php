<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSetupIsComplete
{
    public function handle(Request $request, Closure $next): Response
    {
        // Example: check a flag on the authenticated admin/user
        $admin = auth()->user(); // or auth('admin')->user() if using a guard

        if (! $admin || ! $admin->setup_completed) {
            return redirect()->route('admin.setup')
                ->with('error', 'Please complete the setup first.');
        }

        return $next($request);
    }
}
