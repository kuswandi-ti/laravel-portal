<?php

namespace App\Models\Scopes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class AreaScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (Auth::guard(getGuardNameLoggedUser())->hasUser()) {
            if (getLoggedUser()->hasRole(getLoggedUserRole())) {
                $builder->where('area_id', getLoggedUserAreaId());
            }
        }
    }
}
