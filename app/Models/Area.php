<?php

namespace App\Models;

use App\Models\Member;
use App\Models\Residence;
use KodePandai\Indonesia\Models\City;
use Illuminate\Database\Eloquent\Model;
use KodePandai\Indonesia\Models\Village;
use KodePandai\Indonesia\Models\District;
use KodePandai\Indonesia\Models\Province;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $guarded = [];

    public function member()
    {
        return $this->hasOne(Member::class);
    }

    public function residence()
    {
        return $this->belongsTo(Residence::class, 'residence_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_code', 'code');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_code', 'code');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_code', 'code');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_code', 'code');
    }
}
