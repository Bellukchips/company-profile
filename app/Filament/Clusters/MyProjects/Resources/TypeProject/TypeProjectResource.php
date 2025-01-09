<?php

namespace App\Filament\Clusters\MyProjects\Resources\TypeProject;

use App\Filament\Clusters\MyProjects;
use App\Filament\Clusters\MyProjects\Resources\TypeProject\TypeProjectResource\Pages;
use App\Filament\Clusters\MyProjects\Resources\TypeProject\TypeProjectResource\RelationManagers;
use App\Models\Project\Project;
use App\Models\Project\TypeProject;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TypeProjectResource extends Resource
{
    protected static ?string $model = TypeProject::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-minus';

    protected static ?string $cluster = MyProjects::class;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::End;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make("name")->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->disabled(fn($record) => Project::where('type_project_id', $record->id)
                        ->exists()),
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
            'index' => Pages\ListTypeProjects::route('/'),
            'create' => Pages\CreateTypeProject::route('/create'),
            'edit' => Pages\EditTypeProject::route('/{record}/edit'),
        ];
    }
}
