<?php

namespace App\Filament\Resources\Contact\ContactResource\Pages;

use App\Filament\Resources\Contact\ContactResource;
use App\Models\Contact\ContactUs;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListContacts extends ListRecords
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        $count = ContactUs::count();
        if ($count == 0) {
            return [
                Actions\CreateAction::make(),
            ];
        } else {
            return [];
        }
    }

    public function getTitle(): string | Htmlable
    {
        return "Contact Us";
    }
}
