<?php

namespace App\Models;

use App\Models\Area;
use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccountCategory extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = [];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    public function account()
    {
        return $this->hasMany(Account::class);
    }
}
