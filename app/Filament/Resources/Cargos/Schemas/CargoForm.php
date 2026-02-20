<?php

namespace App\Filament\Resources\Cargos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CargoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('tipo_sala')
                    ->required()
                    ->default('Profesor'),
                Toggle::make('active')
                    ->required(),
            ]);
    }
}
