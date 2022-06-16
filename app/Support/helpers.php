<?php

use Illuminate\Support\Facades\Auth;

function can(string $premission, ?string $guard = null): bool
{
    return Auth::guard($guard)->user()->can($premission);
}
