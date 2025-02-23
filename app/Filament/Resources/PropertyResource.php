<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationGroup = 'Gestion Immobilière';
    protected static ?string $label = 'Propriétés';
    protected static ?string $pluralLabel = 'Propriétés';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nom de la propriété')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Description')
                    ->required()
                    ->maxLength(500),

                TextInput::make('price_per_night')
                    ->label('Prix par nuit (€)')
                    ->required()
                    ->numeric() 
                    ->minValue(0),

                FileUpload::make('image')
                    ->label('Image de la propriété')
                    ->directory('properties') 
                    ->image()
                    ->visibility('public')
                    ->nullable(),
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                ImageColumn::make('image')
                    ->label('Aperçu')
                    ->circular(),

                TextColumn::make('name')
                    ->label('Nom')
                    ->searchable(),

                TextColumn::make('price_per_night')
                    ->label('Prix par nuit (€)')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Ajouté le')
                    ->dateTime(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
