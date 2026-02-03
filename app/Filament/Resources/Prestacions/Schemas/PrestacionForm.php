<?php

namespace App\Filament\Resources\Prestacions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PrestacionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Personal')

                    ->schema([
                        TextInput::make('nombre')
                            ->required(),
                        TextInput::make('motivo')
                            ->required(),

                        Select::make('personal_id')->relationship(name: 'personal', titleAttribute: 'nombres')
                            ->searchable()
                            ->preload()
                            ->required(),

                    ]),
                Section::make('Personal')->schema([


                    DatePicker::make('fecha_prestacion')
                        ->native(false)
                        ->displayFormat('d/m/Y'),

                             DatePicker::make('fecha_devolucion')
                        ->native(false)
                        ->displayFormat('d/m/Y'),

                    Select::make('equipo_id')->relationship(name: 'equipo', titleAttribute: 'nombre')
                        ->searchable()
                        ->preload()
                        ->required(),
                    Toggle::make('estado')
                        ->required(),

                ])

            ]);
    }
}
