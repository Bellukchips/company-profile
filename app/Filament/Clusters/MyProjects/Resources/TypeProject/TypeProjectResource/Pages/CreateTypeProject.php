<?php

namespace App\Filament\Clusters\MyProjects\Resources\TypeProject\TypeProjectResource\Pages;

use App\Filament\Clusters\MyProjects\Resources\TypeProject\TypeProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTypeProject extends CreateRecord
{
    protected static string $resource = TypeProjectResource::class;


    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
