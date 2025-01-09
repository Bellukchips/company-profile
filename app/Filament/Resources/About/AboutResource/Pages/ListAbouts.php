<?php

namespace App\Filament\Resources\About\AboutResource\Pages;

use App\Filament\Resources\About\AboutResource;
use App\Models\About\About;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAbouts extends ListRecords
{
    protected static string $resource = AboutResource::class;

    protected function getHeaderActions(): array
    {
        $count = About::count();
        if($count == 0){
            return [
                Actions\CreateAction::make(),
            ];
        }else{
            return [];
        }
    }
}
