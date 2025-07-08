<?php

namespace App\Models\Construction;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    protected static function booted()
    {
        static::deleting(function ($construction) {
            if ($construction->photo && Storage::disk('public')->exists($construction->photo)) {
                Storage::disk('public')->delete($construction->photo);
            }
        });

        static::updating(function ($construction) {
            if ($construction->isDirty('photo')) {
                $oldPhoto = $construction->getOriginal('photo');

                if ($oldPhoto && Storage::disk('public')->exists($oldPhoto)) {
                    Storage::disk('public')->delete($oldPhoto);
                }
            }
        });
    }
}
