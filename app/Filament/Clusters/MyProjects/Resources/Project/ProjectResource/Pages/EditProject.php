<?php

namespace App\Filament\Clusters\MyProjects\Resources\Project\ProjectResource\Pages;

use App\Filament\Clusters\MyProjects\Resources\Project\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProject extends EditRecord
{
    protected static string $resource = ProjectResource::class;

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
