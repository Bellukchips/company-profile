<?php

namespace App\Filament\Clusters\MyProjects\Resources\TypeProject\TypeProjectResource\Pages;

use App\Filament\Clusters\MyProjects\Resources\TypeProject\TypeProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypeProject extends EditRecord
{
    protected static string $resource = TypeProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }


    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('edit', [
            'record' => $this->record
        ]);
    }
}
