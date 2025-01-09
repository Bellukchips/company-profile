<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProject extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        "name"
    ];
}
