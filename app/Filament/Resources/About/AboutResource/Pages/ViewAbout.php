<?php

namespace App\Filament\Resources\About\AboutResource\Pages;

use App\Filament\Resources\About\AboutResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAbout extends ViewRecord
{
    protected static string $resource = AboutResource::class;

    protected static ?string $navigationLabel = 'View About';


    protected function getActions(): array
    {

        return [
            Actions\EditAction::make(),
        ];
    }
}
