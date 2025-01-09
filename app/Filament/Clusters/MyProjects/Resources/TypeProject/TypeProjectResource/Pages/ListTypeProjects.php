<?php

namespace App\Filament\Clusters\MyProjects\Resources\TypeProject\TypeProjectResource\Pages;

use App\Filament\Clusters\MyProjects\Resources\TypeProject\TypeProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypeProjects extends ListRecords
{
    protected static string $resource = TypeProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
