<?php

use Carbon\Carbon;
use App\Models\Setting;
use Illuminate\Support\Str;
use App\Models\SettingMember;
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

function truncateString(string $text, int $limit = 45): ?string
{
    return Str::limit($text, $limit, '...');
}

function getArraySuperAdminPermission()
{
    return [
        ['guard_name' => 'admin', 'name' => 'package create', 'group_name' => 'Package Permission'],
        ['guard_name' => 'admin', 'name' => 'package delete', 'group_name' => 'Package Permission'],
        ['guard_name' => 'admin', 'name' => 'package index', 'group_name' => 'Package Permission'],
        ['guard_name' => 'admin', 'name' => 'package restore', 'group_name' => 'Package Permission'],
        ['guard_name' => 'admin', 'name' => 'package update', 'group_name' => 'Package Permission'],
        ['guard_name' => 'admin', 'name' => 'residence create', 'group_name' => 'Residence Permission'],
        ['guard_name' => 'admin', 'name' => 'residence delete', 'group_name' => 'Residence Permission'],
        ['guard_name' => 'admin', 'name' => 'residence index', 'group_name' => 'Residence Permission'],
        ['guard_name' => 'admin', 'name' => 'residence restore', 'group_name' => 'Residence Permission'],
        ['guard_name' => 'admin', 'name' => 'residence update', 'group_name' => 'Residence Permission'],
        ['guard_name' => 'admin', 'name' => 'permission create', 'group_name' => 'Permission Permission'],
        ['guard_name' => 'admin', 'name' => 'permission delete', 'group_name' => 'Permission Permission'],
        ['guard_name' => 'admin', 'name' => 'permission index', 'group_name' => 'Permission Permission'],
        ['guard_name' => 'admin', 'name' => 'permission update', 'group_name' => 'Permission Permission'],
        ['guard_name' => 'admin', 'name' => 'role admin create', 'group_name' => 'Role Permission'],
        ['guard_name' => 'admin', 'name' => 'role admin delete', 'group_name' => 'Role Permission'],
        ['guard_name' => 'admin', 'name' => 'role admin index', 'group_name' => 'Role Permission'],
        ['guard_name' => 'admin', 'name' => 'role admin update', 'group_name' => 'Role Permission'],
        ['guard_name' => 'admin', 'name' => 'sytem admin user create', 'group_name' => 'System Admin User Permission'],
        ['guard_name' => 'admin', 'name' => 'sytem admin user delete', 'group_name' => 'System Admin User Permission'],
        ['guard_name' => 'admin', 'name' => 'sytem admin user index', 'group_name' => 'System Admin User Permission'],
        ['guard_name' => 'admin', 'name' => 'sytem admin user restore', 'group_name' => 'System Admin User Permission'],
        ['guard_name' => 'admin', 'name' => 'sytem admin user update', 'group_name' => 'System Admin User Permission'],
        ['guard_name' => 'admin', 'name' => 'member admin user delete', 'group_name' => 'Member Admin User Permission'],
        ['guard_name' => 'admin', 'name' => 'member admin user index', 'group_name' => 'Member Admin User Permission'],
        ['guard_name' => 'admin', 'name' => 'member admin user restore', 'group_name' => 'Member Admin User Permission'],
        ['guard_name' => 'admin', 'name' => 'member admin user update', 'group_name' => 'Member Admin User Permission'],
        ['guard_name' => 'admin', 'name' => 'language create', 'group_name' => 'Language Permission'],
        ['guard_name' => 'admin', 'name' => 'language delete', 'group_name' => 'Language Permission'],
        ['guard_name' => 'admin', 'name' => 'language index', 'group_name' => 'Language Permission'],
        ['guard_name' => 'admin', 'name' => 'language restore', 'group_name' => 'Language Permission'],
        ['guard_name' => 'admin', 'name' => 'language update', 'group_name' => 'Language Permission'],
        ['guard_name' => 'admin', 'name' => 'translate admin generate', 'group_name' => 'Translate Admin Permission'],
        ['guard_name' => 'admin', 'name' => 'translate admin index', 'group_name' => 'Translate Admin Permission'],
        ['guard_name' => 'admin', 'name' => 'translate admin trans', 'group_name' => 'Translate Admin Permission'],
        ['guard_name' => 'admin', 'name' => 'translate admin update', 'group_name' => 'Translate Admin Permission'],
        ['guard_name' => 'admin', 'name' => 'translate mobile generate', 'group_name' => 'Translate Mobile Permission'],
        ['guard_name' => 'admin', 'name' => 'translate mobile index', 'group_name' => 'Translate Mobile Permission'],
        ['guard_name' => 'admin', 'name' => 'translate mobile trans', 'group_name' => 'Translate Mobile Permission'],
        ['guard_name' => 'admin', 'name' => 'translate mobile update', 'group_name' => 'Translate Mobile Permission'],
        ['guard_name' => 'admin', 'name' => 'translate website generate', 'group_name' => 'Translate Website Permission'],
        ['guard_name' => 'admin', 'name' => 'translate website index', 'group_name' => 'Translate Website Permission'],
        ['guard_name' => 'admin', 'name' => 'translate website trans', 'group_name' => 'Translate Website Permission'],
        ['guard_name' => 'admin', 'name' => 'translate website update', 'group_name' => 'Translate Website Permission'],
        ['guard_name' => 'admin', 'name' => 'system setting', 'group_name' => 'Setting Permission'],
    ];
}

function getArrayMemberAdminPermission()
{
    return [
        ['guard_name' => 'member', 'name' => 'street create', 'group_name' => 'Street Permission'],
        ['guard_name' => 'member', 'name' => 'street delete', 'group_name' => 'Street Permission'],
        ['guard_name' => 'member', 'name' => 'street index', 'group_name' => 'Street Permission'],
        ['guard_name' => 'member', 'name' => 'street restore', 'group_name' => 'Street Permission'],
        ['guard_name' => 'member', 'name' => 'street update', 'group_name' => 'Street Permission'],
        ['guard_name' => 'member', 'name' => 'block create', 'group_name' => 'Block Permission'],
        ['guard_name' => 'member', 'name' => 'block delete', 'group_name' => 'Block Permission'],
        ['guard_name' => 'member', 'name' => 'block index', 'group_name' => 'Block Permission'],
        ['guard_name' => 'member', 'name' => 'block restore', 'group_name' => 'Block Permission'],
        ['guard_name' => 'member', 'name' => 'block update', 'group_name' => 'Block Permission'],
        ['guard_name' => 'member', 'name' => 'house create', 'group_name' => 'House Permission'],
        ['guard_name' => 'member', 'name' => 'house delete', 'group_name' => 'House Permission'],
        ['guard_name' => 'member', 'name' => 'house index', 'group_name' => 'House Permission'],
        ['guard_name' => 'member', 'name' => 'house restore', 'group_name' => 'House Permission'],
        ['guard_name' => 'member', 'name' => 'house update', 'group_name' => 'House Permission'],
        ['guard_name' => 'member', 'name' => 'role member create', 'group_name' => 'Role Permission'],
        ['guard_name' => 'member', 'name' => 'role member delete', 'group_name' => 'Role Permission'],
        ['guard_name' => 'member', 'name' => 'role member index', 'group_name' => 'Role Permission'],
        ['guard_name' => 'member', 'name' => 'role member update', 'group_name' => 'Role Permission'],
        ['guard_name' => 'member', 'name' => 'member admin user create', 'group_name' => 'Member Admin User Permission'],
        ['guard_name' => 'member', 'name' => 'member admin user delete', 'group_name' => 'Member Admin User Permission'],
        ['guard_name' => 'member', 'name' => 'member admin user index', 'group_name' => 'Member Admin User Permission'],
        ['guard_name' => 'member', 'name' => 'member admin user restore', 'group_name' => 'Member Admin User Permission'],
        ['guard_name' => 'member', 'name' => 'member admin user update', 'group_name' => 'Member Admin User Permission'],
        ['guard_name' => 'member', 'name' => 'member staff user create', 'group_name' => 'Member Staff User Permission'],
        ['guard_name' => 'member', 'name' => 'member staff user delete', 'group_name' => 'Member Staff User Permission'],
        ['guard_name' => 'member', 'name' => 'member staff user index', 'group_name' => 'Member Staff User Permission'],
        ['guard_name' => 'member', 'name' => 'member staff user restore', 'group_name' => 'Member Staff User Permission'],
        ['guard_name' => 'member', 'name' => 'member staff user update', 'group_name' => 'Member Staff User Permission'],
        ['guard_name' => 'member', 'name' => 'member user restore', 'group_name' => 'Member User Permission'],
        ['guard_name' => 'member', 'name' => 'announcement create', 'group_name' => 'Announcement Permission'],
        ['guard_name' => 'member', 'name' => 'announcement delete', 'group_name' => 'Announcement Permission'],
        ['guard_name' => 'member', 'name' => 'announcement index', 'group_name' => 'Announcement Permission'],
        ['guard_name' => 'member', 'name' => 'announcement restore', 'group_name' => 'Announcement Permission'],
        ['guard_name' => 'member', 'name' => 'announcement update', 'group_name' => 'Announcement Permission'],
        ['guard_name' => 'member', 'name' => 'member setting', 'group_name' => 'Setting Permission'],
        ['guard_name' => 'member', 'name' => 'account category restore', 'group_name' => 'Account Permission'],
        ['guard_name' => 'member', 'name' => 'account restore', 'group_name' => 'Account Permission'],
    ];
}

function getArrayUserAllPermission()
{
    return [
        ['guard_name' => 'web', 'name' => 'member user create', 'group_name' => 'Member User Permission'],
        ['guard_name' => 'web', 'name' => 'member user delete', 'group_name' => 'Member User Permission'],
        ['guard_name' => 'web', 'name' => 'member user index', 'group_name' => 'Member User Permission'],
        ['guard_name' => 'web', 'name' => 'member user update', 'group_name' => 'Member User Permission'],
        ['guard_name' => 'web', 'name' => 'bill create', 'group_name' => 'Bill Permission'],
        ['guard_name' => 'web', 'name' => 'bill delete', 'group_name' => 'Bill Permission'],
        ['guard_name' => 'web', 'name' => 'bill index', 'group_name' => 'Bill Permission'],
        ['guard_name' => 'web', 'name' => 'bill update', 'group_name' => 'Bill Permission'],
        ['guard_name' => 'web', 'name' => 'income create', 'group_name' => 'Income Permission'],
        ['guard_name' => 'web', 'name' => 'income delete', 'group_name' => 'Income Permission'],
        ['guard_name' => 'web', 'name' => 'income index', 'group_name' => 'Income Permission'],
        ['guard_name' => 'web', 'name' => 'income update', 'group_name' => 'Income Permission'],
        ['guard_name' => 'web', 'name' => 'expense approve', 'group_name' => 'Expense Permission'],
        ['guard_name' => 'web', 'name' => 'expense create', 'group_name' => 'Expense Permission'],
        ['guard_name' => 'web', 'name' => 'expense delete', 'group_name' => 'Expense Permission'],
        ['guard_name' => 'web', 'name' => 'expense index', 'group_name' => 'Expense Permission'],
        ['guard_name' => 'web', 'name' => 'expense update', 'group_name' => 'Expense Permission'],
        ['guard_name' => 'web', 'name' => 'account category create', 'group_name' => 'Account Permission'],
        ['guard_name' => 'web', 'name' => 'account category delete', 'group_name' => 'Account Permission'],
        ['guard_name' => 'web', 'name' => 'account category index', 'group_name' => 'Account Permission'],
        ['guard_name' => 'web', 'name' => 'account category update', 'group_name' => 'Account Permission'],
        ['guard_name' => 'web', 'name' => 'account create', 'group_name' => 'Account Permission'],
        ['guard_name' => 'web', 'name' => 'account delete', 'group_name' => 'Account Permission'],
        ['guard_name' => 'web', 'name' => 'account index', 'group_name' => 'Account Permission'],
        ['guard_name' => 'web', 'name' => 'account update', 'group_name' => 'Account Permission'],
    ];
}

function setArrayMemberAdminPermission()
{
    return [
        'street create',
        'street delete',
        'street index',
        'street restore',
        'street update',
        'block create',
        'block delete',
        'block index',
        'block restore',
        'block update',
        'house create',
        'house delete',
        'house index',
        'house restore',
        'house update',
        'role member create',
        'role member delete',
        'role member index',
        'role member update',
        'member admin user create',
        'member admin user delete',
        'member admin user index',
        'member admin user restore',
        'member admin user update',
        'member staff user create',
        'member staff user delete',
        'member staff user index',
        'member staff user restore',
        'member staff user update',
        'member user restore',
        'announcement create',
        'announcement delete',
        'announcement index',
        'announcement restore',
        'announcement update',
        'member setting',
    ];
}

function setArrayKetuaPermission()
{
    return [
        'bill index',
        'expense approve',
        'expense index',
        'income index',
        'member user index',
    ];
}

function setArrayBendaharaPermission()
{
    return [
        'bill create',
        'bill delete',
        'bill index',
        'bill update',
        'expense create',
        'expense delete',
        'expense index',
        'expense update',
        'income create',
        'income delete',
        'income index',
        'income update',
    ];
}

function setArraySekretarisPermission()
{
    return [
        'member user create',
        'member user delete',
        'member user index',
        'member user update',
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

function getGuardTextAdmin(): ?string
{
    return config('common.guard_text_admin');
}

function getGuardTextMember(): ?string
{
    return config('common.guard_text_member');
}

function getGuardTextUser(): ?string
{
    return config('common.guard_text_user');
}

function getLoggedUser()
{
    return Auth::guard(getGuardNameLoggedUser())->user();
}

function getLoggedUserAreaId()
{
    return getLoggedUser()->area->id;
}

function getSettingAdmin()
{
    return Setting::pluck('value', 'key')->toArray();
}

function getSettingMember()
{
    return !empty(getLoggedUser()) ? SettingMember::where('area_id', getLoggedUserAreaId())
        ->get()
        ->pluck('value', 'key')
        ->toArray() : '';
}

function setStatusBadge($status)
{
    return $status == 1 ? 'info' : 'danger';
}

function setStatusText($status)
{
    return $status == 1 ? 'Active' : 'Inactive';
}

function saveDateTimeNow()
{
    return Carbon::now()->addHour(7)->format('Y-m-d H:i:s');
}

function saveDateNow()
{
    return Carbon::now()->addHour(7)->format('Y-m-d');
}

function saveTimeNow()
{
    return Carbon::now()->addHour(7)->format('H:i:s');
}

function getHouseAddressUser(): ?string
{
    return getLoggedUser()->house_street_name . ', ' . getLoggedUser()->house_block . '/' . getLoggedUser()->house_number;
}

function noImageCircle(): ?string
{
    return config('common.path_storage') . config('common.default_image_circle');
}

function noImageSquare(): ?string
{
    return config('common.path_storage') . config('common.default_image_square');
}

function canAccess(array $permissions)
{
    $permission = getLoggedUser()->hasAnyPermission($permissions);
    $super_admin = getLoggedUser()->hasRole('Super Admin');

    if ($permission || $super_admin) {
        return true;
    } else {
        return false;
    }
}

function getLoggedUserRole()
{
    $role = getLoggedUser()->getRoleNames();
    return $role->first();
}

function checkPermission(string $permission)
{
    return getLoggedUser()->hasPermissionTo($permission);
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
