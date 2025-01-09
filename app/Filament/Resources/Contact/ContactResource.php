<?php

namespace App\Filament\Resources\Contact;

use App\Filament\Resources\Contact\ContactResource\Pages;
use App\Filament\Resources\Contact\ContactResource\RelationManagers;
use App\Models\Contact\Contact;
use App\Models\Contact\ContactUs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = ContactUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'Contact Us';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')->required(),
                Forms\Components\TextInput::make('address')->required(),
                Forms\Components\TextInput::make('phone')->required(),
                Forms\Components\TextInput::make('map_point')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("email"),
                Tables\Columns\TextColumn::make("address"),
                Tables\Columns\TextColumn::make("phone"),
                Tables\Columns\TextColumn::make("map_point"),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
        // ->bulkActions([
        //     Tables\Actions\BulkActionGroup::make([
        //         Tables\Actions\DeleteBulkAction::make(),
        //     ]),
        // ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
