<?php

namespace App\Filament\Resources\OurService\OurServiceResource\Pages;

use App\Filament\Resources\OurService\OurServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurService extends EditRecord
{
    protected static string $resource = OurServiceResource::class;

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
}
