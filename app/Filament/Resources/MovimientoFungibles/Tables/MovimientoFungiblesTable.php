<?php

namespace App\Filament\Resources\MovimientoFungibles\Tables;

use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;

class MovimientoFungiblesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tipo'),
                TextColumn::make('fecha')
                    ->date()
                    ->sortable(),
                TextColumn::make('fungible.nombre')
                    ->label('Fungible')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('cantidad')
                    ->numeric()
                    ->sortable()
                    ->label('Cantidad'),

                TextColumn::make('personal.nombres')
                    ->label('Personal solicitante')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('sala.nombre')
                    ->label('Sala de uso')
                    ->sortable()
                    ->searchable(),


                TextColumn::make('stock_anterior')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('stock_actual')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('motivo')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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

                BulkAction::make('eliminar_y_revertir_stock')
                    ->label('Eliminar y revertir stock')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function ($records) {

                        DB::transaction(function () use ($records) {

                            foreach ($records as $movimiento) {

                                $fungible = \App\Models\Fungible::lockForUpdate()
                                    ->find($movimiento->fungible_id);

                                if (!$fungible) {
                                    continue;
                                }

                                $stockActual = $fungible->stock;

                                // 🔄 REVERSAR MOVIMIENTO
                                switch ($movimiento->tipo) {

                                    case 'entrada':
                                        $nuevoStock = $stockActual - $movimiento->cantidad;
                                        break;

                                    case 'salida':
                                        $nuevoStock = $stockActual + $movimiento->cantidad;
                                        break;

                                    case 'ajuste':
                                        $nuevoStock = $movimiento->stock_anterior;
                                        break;

                                    default:
                                        continue 2;
                                }

                                // 🔥 ACTUALIZAR STOCK
                                $fungible->update([
                                    'stock_actual' => $nuevoStock,
                                ]);

                                // 🗑 ELIMINAR MOVIMIENTO
                                $movimiento->delete();
                            }
                        });

                        Notification::make()
                            ->title('Movimientos eliminados')
                            ->body('El stock fue revertido correctamente')
                            ->success()
                            ->send();
                    }),
            ]);
    }
}
