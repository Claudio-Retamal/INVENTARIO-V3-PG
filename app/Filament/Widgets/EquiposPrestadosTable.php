<?php

namespace App\Filament\Widgets;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Equipo;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class EquiposPrestadosTable extends TableWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(fn(): Builder => Equipo::query())
            ->columns([
                //
                TextColumn::make('nombre')->label('Nombre'),
                TextColumn::make('numero_serial')->label('Serial'),
                TextColumn::make('modelo')->label('Modelo'),
                TextColumn::make('marca')->label('Marca'),
                TextColumn::make('sala.nombre')->label('Sala'),            // Relación
                TextColumn::make('personal.nombres')->label('Responsable'), // Relación

                IconColumn::make('active')
                    ->label('Prestado')
                    ->boolean()
                    ->trueIcon('heroicon-o-lock-closed')
                    ->falseIcon('heroicon-o-lock-open')
                    ->trueColor('danger')
                    ->falseColor('success')
                    ->tooltip(fn($record) => $record->active ? 'Prestado' : 'Disponible'),
            ])
            ->filters([
                //
                SelectFilter::make('active')
                    ->label('active')
                    ->options([
                        1 => 'Prestado',
                        0 => 'Disponible',
                    ]),
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
