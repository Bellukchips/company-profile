<?php

namespace App\Filament\Resources\Setting\SettingResource\Pages;

use App\Filament\Resources\Setting\SettingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSetting extends CreateRecord
{
    protected static string $resource = SettingResource::class;
    protected static bool $canCreateAnother = false;
    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
