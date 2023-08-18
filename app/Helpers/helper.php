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

function getArraySuperAdminPermission()
{
    return [
        ['guard_name' => 'admin', 'name' => 'package index', 'group_name' => 'Package Permission'],
        ['guard_name' => 'admin', 'name' => 'package create', 'group_name' => 'Package Permission'],
        ['guard_name' => 'admin', 'name' => 'package update', 'group_name' => 'Package Permission'],
        ['guard_name' => 'admin', 'name' => 'package non aktif', 'group_name' => 'Package Permission'],
        ['guard_name' => 'admin', 'name' => 'permission index', 'group_name' => 'Permission Permission'],
        ['guard_name' => 'admin', 'name' => 'permission create', 'group_name' => 'Permission Permission'],
        ['guard_name' => 'admin', 'name' => 'permission update', 'group_name' => 'Permission Permission'],
        ['guard_name' => 'admin', 'name' => 'permission delete', 'group_name' => 'Permission Permission'],
        ['guard_name' => 'admin', 'name' => 'role index', 'group_name' => 'Role Permission'],
        ['guard_name' => 'admin', 'name' => 'role create', 'group_name' => 'Role Permission'],
        ['guard_name' => 'admin', 'name' => 'role update', 'group_name' => 'Role Permission'],
        ['guard_name' => 'admin', 'name' => 'role delete', 'group_name' => 'Role Permission'],
        ['guard_name' => 'admin', 'name' => 'admin index', 'group_name' => 'Admin Permission'],
        ['guard_name' => 'admin', 'name' => 'admin create', 'group_name' => 'Admin Permission'],
        ['guard_name' => 'admin', 'name' => 'admin update', 'group_name' => 'Admin Permission'],
        ['guard_name' => 'admin', 'name' => 'admin non aktif', 'group_name' => 'Admin Permission'],
        ['guard_name' => 'admin', 'name' => 'member index', 'group_name' => 'Member Permission'],
        ['guard_name' => 'admin', 'name' => 'member create', 'group_name' => 'Member Permission'],
        ['guard_name' => 'admin', 'name' => 'member update', 'group_name' => 'Member Permission'],
        ['guard_name' => 'admin', 'name' => 'member non aktif', 'group_name' => 'Member Permission'],
        ['guard_name' => 'admin', 'name' => 'language index', 'group_name' => 'Language Permission'],
        ['guard_name' => 'admin', 'name' => 'language create', 'group_name' => 'Language Permission'],
        ['guard_name' => 'admin', 'name' => 'language update', 'group_name' => 'Language Permission'],
        ['guard_name' => 'admin', 'name' => 'language non aktif', 'group_name' => 'Language Permission'],
        ['guard_name' => 'admin', 'name' => 'website language index', 'group_name' => 'Website Language Permission'],
        ['guard_name' => 'admin', 'name' => 'website language create', 'group_name' => 'Website Language Permission'],
        ['guard_name' => 'admin', 'name' => 'website language update', 'group_name' => 'Website Language Permission'],
        ['guard_name' => 'admin', 'name' => 'website language delete', 'group_name' => 'Website Language Permission'],
        ['guard_name' => 'admin', 'name' => 'system language index', 'group_name' => 'Website Language Permission'],
        ['guard_name' => 'admin', 'name' => 'system language create', 'group_name' => 'Website Language Permission'],
        ['guard_name' => 'admin', 'name' => 'system language update', 'group_name' => 'Website Language Permission'],
        ['guard_name' => 'admin', 'name' => 'system language delete', 'group_name' => 'Website Language Permission'],
        ['guard_name' => 'admin', 'name' => 'offline payment index', 'group_name' => 'Offline Payment Permission'],
        ['guard_name' => 'admin', 'name' => 'offline payment create', 'group_name' => 'Offline Payment Permission'],
        ['guard_name' => 'admin', 'name' => 'offline payment update', 'group_name' => 'Offline Payment Permission'],
        ['guard_name' => 'admin', 'name' => 'offline payment delete', 'group_name' => 'Offline Payment Permission'],
        ['guard_name' => 'admin', 'name' => 'online payment index', 'group_name' => 'Online Payment Permission'],
        ['guard_name' => 'admin', 'name' => 'online payment update', 'group_name' => 'Online Payment Permission'],
        ['guard_name' => 'admin', 'name' => 'online payment delete', 'group_name' => 'Online Payment Permission'],
        ['guard_name' => 'admin', 'name' => 'support ticket index', 'group_name' => 'Support Ticket Permission'],
        ['guard_name' => 'admin', 'name' => 'support ticket update', 'group_name' => 'Support Ticket Permission'],
        ['guard_name' => 'admin', 'name' => 'support ticket delete', 'group_name' => 'Support Ticket Permission'],
        ['guard_name' => 'admin', 'name' => 'website setting index', 'group_name' => 'Website Setting Permission'],
        ['guard_name' => 'admin', 'name' => 'website setting update', 'group_name' => 'Website Setting Permission'],
        ['guard_name' => 'admin', 'name' => 'system setting index', 'group_name' => 'System Setting Permission'],
        ['guard_name' => 'admin', 'name' => 'system setting update', 'group_name' => 'System Setting Permission'],
    ];
}

function getArrayMemberAdminPermission()
{
    return [
        ['guard_name' => 'member', 'name' => 'area index', 'group_name' => 'Area Permission'],
        ['guard_name' => 'member', 'name' => 'area create', 'group_name' => 'Area Permission'],
        ['guard_name' => 'member', 'name' => 'area update', 'group_name' => 'Area Permission'],
        ['guard_name' => 'member', 'name' => 'staff index', 'group_name' => 'Staff Permission'],
        ['guard_name' => 'member', 'name' => 'staff create', 'group_name' => 'Staff Permission'],
        ['guard_name' => 'member', 'name' => 'staff update', 'group_name' => 'Staff Permission'],
        ['guard_name' => 'member', 'name' => 'staff non aktif', 'group_name' => 'Staff Permission'],
    ];
}

function setArrayMemberAdminPermission()
{
    return [
        'area index',
        'area create',
        'area update',
        'staff index',
        'staff create',
        'staff update',
        'staff non aktif',
    ];
}

function getArrayUserAllPermission()
{
    return [
        ['guard_name' => 'web', 'name' => 'warga index', 'group_name' => 'Warga Permission'],
        ['guard_name' => 'web', 'name' => 'warga create', 'group_name' => 'Warga Permission'],
        ['guard_name' => 'web', 'name' => 'warga update', 'group_name' => 'Warga Permission'],
        ['guard_name' => 'web', 'name' => 'warga non aktif', 'group_name' => 'Warga Permission'],
        ['guard_name' => 'web', 'name' => 'tagihan index', 'group_name' => 'Tagihan Permission'],
        ['guard_name' => 'web', 'name' => 'tagihan create', 'group_name' => 'Tagihan Permission'],
        ['guard_name' => 'web', 'name' => 'tagihan update', 'group_name' => 'Tagihan Permission'],
        ['guard_name' => 'web', 'name' => 'tagihan delete', 'group_name' => 'Tagihan Permission'],
        ['guard_name' => 'web', 'name' => 'pemasukan index', 'group_name' => 'Pemasukan Permission'],
        ['guard_name' => 'web', 'name' => 'pemasukan create', 'group_name' => 'Pemasukan Permission'],
        ['guard_name' => 'web', 'name' => 'pemasukan update', 'group_name' => 'Pemasukan Permission'],
        ['guard_name' => 'web', 'name' => 'pemasukan delete', 'group_name' => 'Pemasukan Permission'],
        ['guard_name' => 'web', 'name' => 'pengeluaran index', 'group_name' => 'Pengeluaran Permission'],
        ['guard_name' => 'web', 'name' => 'pengeluaran create', 'group_name' => 'Pengeluaran Permission'],
        ['guard_name' => 'web', 'name' => 'pengeluaran update', 'group_name' => 'Pengeluaran Permission'],
        ['guard_name' => 'web', 'name' => 'pengeluaran delete', 'group_name' => 'Pengeluaran Permission'],
        ['guard_name' => 'web', 'name' => 'approve pengeluaran', 'group_name' => 'Pengeluaran Permission'],
    ];
}

function setArrayKetuaPermission()
{
    return [
        'warga index',
        'pemasukan index',
        'pengeluaran index',
        'approve pengeluaran',
    ];
}

function setArrayBendaharaPermission()
{
    return [
        'tagihan index',
        'tagihan create',
        'tagihan update',
        'tagihan delete',
        'pemasukan index',
        'pemasukan create',
        'pemasukan update',
        'pemasukan delete',
        'pengeluaran index',
        'pengeluaran create',
        'pengeluaran update',
        'pengeluaran delete',
    ];
}

function setArraySekretarisPermission()
{
    return [
        'warga index',
        'warga create',
        'warga update',
        'warga non aktif',
    ];
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

function getLoggedUserAreaId()
{
    return getLoggedUser()->area->id;
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
