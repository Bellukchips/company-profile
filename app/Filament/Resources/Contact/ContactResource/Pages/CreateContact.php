<?php

namespace App\Filament\Resources\Contact\ContactResource\Pages;

use App\Filament\Resources\Contact\ContactResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateContact extends CreateRecord
{
    protected static string $resource = ContactResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    public function getTitle(): string | Htmlable
    {
        return "Create Contact Us";
    }
}
