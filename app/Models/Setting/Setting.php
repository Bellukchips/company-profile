<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'site_name',
        'overview'
    ];
}
