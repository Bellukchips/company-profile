<?php

namespace App\Filament\Resources\Setting\SettingResource\Pages;

use App\Filament\Resources\Setting\SettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSetting extends EditRecord
{
    protected static string $resource = SettingResource::class;

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
}
