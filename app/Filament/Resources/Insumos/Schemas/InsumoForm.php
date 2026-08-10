<?php

namespace App\Filament\Resources\Insumos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InsumoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('marca')
                    ->required(),

                Select::make('tipo_insumos_id')
                    ->label('Tipo de insumo')
                    ->relationship('tipoInsumo', 'nombre')
                    ->required()
                    ->searchable()
                    ->preload()

            ]);
    }
}
