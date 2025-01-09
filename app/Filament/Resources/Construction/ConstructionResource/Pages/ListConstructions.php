<?php

namespace App\Filament\Resources\Construction\ConstructionResource\Pages;

use App\Filament\Resources\Construction\ConstructionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use PhpParser\Node\Stmt\Label;
use Illuminate\Contracts\Support\Htmlable;

class ListConstructions extends ListRecords
{
    protected static string $resource = ConstructionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Create Construction'),
        ];
    }

    public function getTitle(): string | Htmlable
    {
        return "Construction";
    }
}
