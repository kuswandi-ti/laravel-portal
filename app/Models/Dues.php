<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dues extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
