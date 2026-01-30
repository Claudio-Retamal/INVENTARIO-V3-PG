<?php

namespace App\Filament\Resources\Personals\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PersonalsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombres')
                    ->searchable(),
                TextColumn::make('apellidos')
                    ->searchable(),



                TextColumn::make('sala.nombre')
                    ->label('Sala')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('cargo.nombre')
                    ->label('Cargo')
                    ->sortable()
                    ->searchable(),







                TextColumn::make('estado')
                    ->numeric()
                    ->sortable(),
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
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
