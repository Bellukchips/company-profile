<?php

namespace App\Filament\Resources\Setting\SettingResource\Pages;

use App\Filament\Resources\Setting\SettingResource;
use App\Models\Setting\Setting;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSettings extends ListRecords
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        $count = Setting::count();
        if ($count == 0) {
            return [
                Actions\CreateAction::make(),
            ];
        } else {
            return [];
        }
    }
}
