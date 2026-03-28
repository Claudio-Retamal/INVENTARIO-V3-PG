<?php

namespace App\Filament\Resources\MovimientoFungibles\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MovimientoFungibleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //

                Select::make('fungible_id')
                    ->label('fungible')
                    ->relationship('fungible', 'nombre')
                    ->searchable()
                    ->required(),


                Select::make('tipo')
                    ->options([
                        'entrada' => 'Entrada',
                        'salida' => 'Salida',
                        'ajuste' => 'Ajuste',
                    ])
                    ->required()
                    ->native(false),

                TextInput::make('cantidad')
                    ->numeric()
                    ->required()
                    ->minValue(1),

                Textarea::make('motivo'),

                TextInput::make('referencia'),


                DatePicker::make('fecha_movimiento')
                    ->default(now()),

            ]);
    }
}
