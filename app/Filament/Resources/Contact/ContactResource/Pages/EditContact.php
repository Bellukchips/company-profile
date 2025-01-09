<?php

namespace App\Filament\Resources\Contact\ContactResource\Pages;

use App\Filament\Resources\Contact\ContactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditContact extends EditRecord
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('edit', [
            'record' => $this->record
        ]);
    }

    public function getTitle(): string | Htmlable
    {
        return "Edit Contact Us";
    }
}
