<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory, HasUuids;

    protected $fillable  = [
        "title",
        "photo",
        "type_project_id",
        "status"
    ];

    public  function typeProject(): BelongsTo
    {
        return $this->belongsTo(TypeProject::class, 'type_project_id');
    }
}
