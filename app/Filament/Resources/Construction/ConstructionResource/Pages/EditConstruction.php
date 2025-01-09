<?php

namespace App\Filament\Resources\Construction\ConstructionResource\Pages;

use App\Filament\Resources\Construction\ConstructionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditConstruction extends EditRecord
{
    protected static string $resource = ConstructionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
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
        return "Edit Construction";
    }
}
