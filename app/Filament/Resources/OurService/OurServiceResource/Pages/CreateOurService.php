<?php

namespace App\Filament\Resources\OurService\OurServiceResource\Pages;

use App\Filament\Resources\OurService\OurServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOurService extends CreateRecord
{
    protected static string $resource = OurServiceResource::class;


    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
