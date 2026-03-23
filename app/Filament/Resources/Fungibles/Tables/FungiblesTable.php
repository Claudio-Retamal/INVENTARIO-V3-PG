<?php

namespace App\Filament\Resources\Fungibles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FungiblesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->searchable(),
                TextColumn::make('marca')
                    ->searchable(),
                TextColumn::make('modelo')
                    ->searchable(),
                TextColumn::make('categoria_fungible.nombre')
                    ->label('Fungible Categoria')
                    ->sortable()
                    ->searchable(),

                 TextColumn::make('categoria_fungible.tipo')
                    ->label('Tipo de fungible')
                    ->sortable()
                    ->searchable(),


                TextColumn::make('unidad_medida')
                    ->searchable(),
                TextColumn::make('stock_minimo')
                    ->numeric()
                    ->sortable(),
              
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
