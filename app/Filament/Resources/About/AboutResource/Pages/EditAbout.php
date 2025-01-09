<?php

namespace App\Filament\Resources\About\AboutResource\Pages;

use App\Filament\Resources\About\AboutResource;
use App\Traits\RemoveImageFromMarkDownEditor;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditAbout extends EditRecord
{
    use RemoveImageFromMarkDownEditor;
    protected static string $resource = AboutResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('edit', [
            'record' => $this->record
        ]);
    }

    protected function beforeSave(): void
    {
        $content = $this->form->getState()['content'];
        $this->removeAndCompareOldImageFromUrlwithNewestImageFromUrl($content, $this->record->content);
    }

    protected function afterSave(): void
    {
        $this->removeFileFromFolderTmp();
    }
}
