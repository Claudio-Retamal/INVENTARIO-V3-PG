<?php

namespace App\Filament\Resources\HistorialPrestacions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HistorialPrestacionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DateTimePicker::make('fecha_prestacion')
                    ->required(),
                DateTimePicker::make('fecha_devolucion')
                    ->required(),
                TextInput::make('personal_id')
                    ->required()
                    ->numeric(),
                TextInput::make('cargo_id')
                    ->required()
                    ->numeric(),
                TextInput::make('sala_id')
                    ->required()
                    ->numeric(),
                TextInput::make('equipo_id')
                    ->required()
                    ->numeric(),
                Toggle::make('active')
                    ->required(),
            ]);
    }
}
