<?php

namespace App\Models;

use App\Models\Area;
use App\Models\AccountCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = [];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(AccountCategory::class, 'account_category_id', 'id');
    }
}
