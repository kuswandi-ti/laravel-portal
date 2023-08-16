<?php

use Illuminate\Support\Facades\Auth;

/** Make sidebar active */
function setSidebarActive(array $routes): ?string
{
    foreach ($routes as $route) {
        if (request()->routeIs($route)) {
            return 'active';
        }
    }

    return '';
}

function getGuardNameLoggedUser(): ?string
{
    if (Auth::guard(getGuardNameAdmin())->check()) {
        return getGuardNameAdmin();
    } else if (Auth::guard(getGuardNameMember())->check()) {
        return getGuardNameMember();
    } else {
        return getGuardNameUser();
    }
}

function getGuardNameAdmin(): ?string
{
    return config('common.guard_name_admin');
}

function getGuardNameMember(): ?string
{
    return config('common.guard_name_member');
}

function getGuardNameUser(): ?string
{
    return config('common.guard_name_user');
}

function getLoggedUser()
{
    return Auth::guard(getGuardNameLoggedUser())->user();
}

function formatAmount($amount)
{
    return number_format((float)$amount, 0, ',', '.');
}

function unformatAmount($str)
{
    $str = str_replace(".", "", $str);
    $str = str_replace(",", ".", $str);
    return (float) $str;
}
