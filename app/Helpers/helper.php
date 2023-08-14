<?php

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

function setSidebarActiveMember(array $routes): ?string
{
    foreach ($routes as $route) {
        if (request()->routeIs($route)) {
            return 'active';
        }
    }

    return '';
}

function setSidebarOpenMember(array $routes): ?string
{
    foreach ($routes as $route) {
        if (request()->routeIs($route)) {
            return 'menu-open';
        }
    }

    return '';
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
