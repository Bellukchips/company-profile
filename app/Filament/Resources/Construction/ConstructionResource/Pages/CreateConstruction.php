<?php

namespace App\Filament\Resources\Construction\ConstructionResource\Pages;

use App\Filament\Resources\Construction\ConstructionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;


class CreateConstruction extends CreateRecord
{
    protected static string $resource = ConstructionResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }


    public function getTitle(): string | Htmlable
    {
        return "Create Construction";
    }
}
