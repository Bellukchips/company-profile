<?php

namespace App\Filament\Resources\About\AboutResource\Pages;

use App\Filament\Resources\About\AboutResource;
use App\Traits\RemoveImageFromMarkDownEditor;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAbout extends CreateRecord
{
    use RemoveImageFromMarkDownEditor;
    protected static string $resource = AboutResource::class;
    protected static bool $canCreateAnother = false;
    protected function afterCreate(): void
    {

        $this->removeFileFromFolderTmp();
    }
    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
