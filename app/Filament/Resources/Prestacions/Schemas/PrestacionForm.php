<?php

namespace App\Filament\Resources\Prestacions\Schemas;

use DateTime;
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

                Section::make('Seleccion de personal')

                    ->schema([
                        TextInput::make('nombre')
                            ->required(),
                        TextInput::make('motivo')
                            ->required(),

                        Select::make('personal_id')
                            ->relationship(
                                name: 'personal',
                                titleAttribute: 'nombres',
                                modifyQueryUsing: fn($query) => $query->select(['id', 'nombres', 'apellidos'])
                            )
                            ->getOptionLabelFromRecordUsing(fn($record) => "{$record->nombres} {$record->apellidos}")
                            ->searchable(['nombres', 'apellidos'])
                            ->optionsLimit(50)
                            ->preload()
                    ]),

                Section::make('Seleccion de equipo')->schema([
                    DateTimePicker::make('fecha_prestacion')
                        ->native(false)
                        ->displayFormat('dd/mm/YYYY'),

                    DateTimePicker::make('fecha_devolucion')
                        ->native(false)
                        ->displayFormat('dd/mm/YYYY'),

                    Select::make('equipo_id')
                        ->relationship(
                            name: 'equipo',
                            titleAttribute: 'nombre',
                            modifyQueryUsing: fn($query) => $query->select(['id', 'nombre', 'numero_serial', 'marca', 'modelo'])->where('active', 1)
                        )
                        ->getOptionLabelFromRecordUsing(fn($record) => "{$record->marca} - {$record->nombre} - {$record->modelo} - {$record->numero_serial} - {$record->active}")
                        ->searchable(['nombre', 'numero_serial', 'marca', 'modelo'])
                        ->optionsLimit(50)
                        ->preload(),



                    Toggle::make('active')
                        ->required(),

                    Select::make('sala_id')->relationship(name: 'sala', titleAttribute: 'nombre')
                        ->searchable()
                        ->preload()
                        ->required(),

                ])

            ]);
    }
}
