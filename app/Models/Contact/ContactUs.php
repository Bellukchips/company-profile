<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory,HasUuids;

    protected $fillable = [
        "address","email","map_point","phone"
    ];
}
