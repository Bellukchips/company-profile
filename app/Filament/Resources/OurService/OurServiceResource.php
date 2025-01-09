<?php

namespace App\Filament\Resources\OurService;

use App\Filament\Resources\OurService\OurServiceResource\Pages;
use App\Filament\Resources\OurService\OurServiceResource\RelationManagers;
use App\Models\Service\OurService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OurServiceResource extends Resource
{
    protected static ?string $model = OurService::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\TextInput::make('icon')->required(),
                Forms\Components\Textarea::make('description')->rows('20')->columnSpan('full')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("title"),
                Tables\Columns\TextColumn::make("icon"),
                Tables\Columns\TextColumn::make("description"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListOurServices::route('/'),
            'create' => Pages\CreateOurService::route('/create'),
            'edit' => Pages\EditOurService::route('/{record}/edit'),
        ];
    }
}
