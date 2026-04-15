<?php

namespace App\Filament\Resources\MovimientoFungibles\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MovimientoFungibleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Select::make('fungible_id')
                ->relationship('fungible', 'nombre')
                ->searchable()
                ->preload(),

            Select::make('tipo')
                ->label('Tipo de movimiento')
                ->options([
                    'entrada' => 'Entrada (aumenta stock)',
                    'salida' => 'Salida (reduce stock)',
                    'ajuste' => 'Ajuste (reemplaza stock)',
                ])
                ->required()
                ->reactive(),

            TextInput::make('cantidad')
                ->label('Cantidad')
                ->numeric()
                ->required()
                ->minValue(1)
                ->helperText('En ajuste, este valor será el stock final'),

            DatePicker::make('fecha')
                ->label('Fecha')
                ->required()
                ->default(now()),

            Select::make('personal_id')
                ->relationship('personal', 'nombres'),

                Select::make('sala_id')
                ->relationship('sala', 'nombre'),

            Textarea::make('motivo')
                ->label('Motivo')
                ->placeholder('Ej: entrega a sala, reposición, ajuste inventario...')
                ->columnSpanFull(),

        ]);
    }
}
