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

function amountFormat($amount)
{
    return number_format((float)$amount, 0, ',', '.');
}
