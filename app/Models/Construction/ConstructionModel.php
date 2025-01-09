<?php

namespace App\Models\Construction;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstructionModel extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'photo',
        'title',
        'description'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
