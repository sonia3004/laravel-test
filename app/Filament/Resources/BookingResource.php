<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use App\Models\Property;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Gestion Immobilière';
    protected static ?string $label = 'Réservation';
    protected static ?string $pluralLabel = 'Réservations';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('Utilisateur')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),

                Select::make('property_id')
                    ->label('Propriété')
                    ->relationship('property', 'name')
                    ->searchable()
                    ->required(),

                DatePicker::make('start_date')
                    ->label('Date de début')
                    ->required(),

                DatePicker::make('end_date')
                    ->label('Date de fin')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('Utilisateur')
                    ->searchable(),

                TextColumn::make('property.name')
                    ->label('Propriété')
                    ->searchable(),

                TextColumn::make('start_date')
                    ->label('Début')
                    ->date()
                    ->sortable(),

                TextColumn::make('end_date')
                    ->label('Fin')
                    ->date()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Réservé le')
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
