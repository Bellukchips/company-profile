<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurService extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'icon',
        'title',
        'description'
    ];
}
