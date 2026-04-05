<?php

namespace App\Filament\Resources\Prestacions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class PrestacionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->searchable(),
                TextColumn::make('motivo')
                    ->searchable(),
                TextColumn::make('fecha_prestacion')
                    ->date('M j, Y')
                    ->sortable(),
                TextColumn::make('fecha_devolucion')
                    ->date('M j, Y')
                    ->sortable(),
                TextColumn::make('personal.nombres')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('equipo.nombre')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('equipo.numero_serial')
                    ->label('Numero de serie')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('sala.nombre')
                    ->numeric()
                    ->sortable(),

                ToggleColumn::make('active')
                    ->label('Prestado')
                    ->onColor('danger')   // cuando está prestado
                    ->offColor('success') // cuando está devuelto
                    ->onIcon('heroicon-o-lock-closed')
                    ->offIcon('heroicon-o-lock-open')
                    ->afterStateUpdated(function ($record, $state) {

                        // Si se marca como devuelto (false)
                        if (!$state) {
                            // liberar el equipo
                            $record->equipo->update([
                                'active' => false,
                            ]);
                        }

                        // Si vuelve a prestarse (true)
                        if ($state) {
                            $record->equipo->update([
                                'active' => true,
                            ]);
                        }
                    }),


                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                //------
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
