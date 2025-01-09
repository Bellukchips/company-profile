<?php

namespace App\Filament\Clusters\MyProjects\Resources\Project;

use App\Filament\Clusters\MyProjects;
use App\Filament\Clusters\MyProjects\Resources\Project\ProjectResource\Pages;
use App\Filament\Clusters\MyProjects\Resources\Project\ProjectResource\RelationManagers;
use App\Models\Project\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    protected static ?string $cluster = MyProjects::class;
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::End;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\Section::make('Photo')
                    ->schema([
                        Forms\Components\FileUpload::make('photo')->required()
                            ->image()
                            ->disk('public')
                            ->directory('project')
                            ->maxSize(1024)
                            ->hiddenLabel(),
                    ])
                    ->collapsible(),
                Forms\Components\Select::make('type_project_id')
                    ->relationship('typeProject', 'name')->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'not_started' => 'Not Started',
                        'ongoing' => 'Ongoing',
                        'finish' => 'Finish',
                    ])->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('typeProject.name')->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'info' => 'not_started',
                        'warning' => 'ongoing',
                        'success' => 'finish',
                    ])
                    ->searchable(),
                Tables\Columns\ImageColumn::make('photo')
                    ->width(90)->height(100)->searchable()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('typeProject')->relationship('typeProject', 'name'),
            ])
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
