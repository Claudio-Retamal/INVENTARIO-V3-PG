<?php

namespace App\Filament\Resources\Salas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SalaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Salas')->schema([
                    TextInput::make('nombre')
                        ->required(),

                    TextInput::make('tipo_sala')
                        ->required(),


                    TextInput::make('numero_equipos')
                        ->required()
                        ->numeric(),

                    Toggle::make('activo')
                        ->required()

                ])
            ]);
    }
}
