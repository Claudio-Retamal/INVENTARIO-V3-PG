<?php

namespace App\Filament\Resources\MovimientoFungibles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MovimientoFungiblesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('fungible.nombre')
                    ->label('Fungible')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('cantidad')
                    ->label('Cantidad')
                    ->sortable(),

                BadgeColumn::make('tipo')
                    ->label('Tipo')
                    ->colors([
                        'success' => 'entrada',
                        'danger' => 'salida',
                    ])
                    ->formatStateUsing(fn($state) => ucfirst($state)),

                TextColumn::make('fecha')
                    ->dateTime('d-m-Y H:i')
                    ->sortable(),

                TextColumn::make('personal.nombres')
                    ->label('Responsable')
                    ->searchable(),

                TextColumn::make('sala.nombre')
                    ->label('Sala')
                    ->searchable(),

                TextColumn::make('stock_anterior')
                    ->label('Stock Antes'),

                TextColumn::make('stock_actual')
                    ->label('Stock Después'),

                TextColumn::make('motivo')
                    ->limit(30)
                    ->tooltip(fn($record) => $record->motivo),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
