<?php

namespace App\Filament\Resources\About;

use App\Filament\Resources\About\AboutResource\Pages;
use App\Filament\Resources\About\AboutResource\RelationManagers;
use App\Models\About\About;
use App\Traits\RemoveImageFromMarkDownEditor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Components;
use Filament\Infolists\Infolist;

class AboutResource extends Resource
{
    use RemoveImageFromMarkDownEditor;
    protected static ?string $model = About::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('slug')->default("about-data"),
                Forms\Components\RichEditor::make('content')
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])->fileAttachmentsDirectory('about/image')
                    ->fileAttachmentsDisk('public')
                    ->required()
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('slug'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make()->before(function (About $record) {

                    if ($record->content) {
                        $instance = new static;
                        $instance->removeImageFromUrl($record->content);
                    }
                }),
            ]);
        // ->bulkActions([
        //     Tables\Actions\BulkActionGroup::make([
        //         Tables\Actions\DeleteBulkAction::make(),
        //     ]),
        // ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Components\Section::make('Content')
                ->schema([
                    Components\TextEntry::make('content')
                        ->prose()
                        ->markdown()
                        ->hiddenLabel(),
                ])
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
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
            'view' => Pages\ViewAbout::route('/{record}')
        ];
    }
}
