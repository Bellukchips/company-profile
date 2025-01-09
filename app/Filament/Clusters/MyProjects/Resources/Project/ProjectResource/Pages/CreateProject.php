<?php

namespace App\Filament\Clusters\MyProjects\Resources\Project\ProjectResource\Pages;

use App\Filament\Clusters\MyProjects\Resources\Project\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;


    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
