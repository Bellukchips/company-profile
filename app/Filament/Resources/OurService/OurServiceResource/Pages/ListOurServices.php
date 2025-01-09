<?php

namespace App\Filament\Resources\OurService\OurServiceResource\Pages;

use App\Filament\Resources\OurService\OurServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOurServices extends ListRecords
{
    protected static string $resource = OurServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
