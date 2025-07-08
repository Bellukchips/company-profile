<?php

namespace App\Filament\Resources\Construction;

use App\Filament\Resources\Construction\ConstructionResource\Pages;
use App\Filament\Resources\Construction\ConstructionResource\RelationManagers;
use App\Models\Construction\Construction;
use App\Models\Construction\ConstructionModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class ConstructionResource extends Resource
{
    protected static ?string $model = ConstructionModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationLabel = 'Construction';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\TextInput::make('description')->required(),
                Forms\Components\Section::make('Photo')
                    ->schema([
                        Forms\Components\FileUpload::make('photo')->required()
                            ->image()
                            ->disk('public')
                            ->directory('construction')
                            ->maxSize(1024)
                            ->hiddenLabel(),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\ImageColumn::make('photo')->disk('public')
                    ->width(90)
                    ->height(100),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListConstructions::route('/'),
            'create' => Pages\CreateConstruction::route('/create'),
            'edit' => Pages\EditConstruction::route('/{record}/edit'),
        ];
    }
}
