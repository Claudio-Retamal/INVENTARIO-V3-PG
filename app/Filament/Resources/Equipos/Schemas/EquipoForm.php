<?php

namespace App\Filament\Resources\Equipos\Schemas;

use App\Models\Equipo;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Actions\Action;
use Filament\Schemas\Schema;

class EquipoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Equipos')->schema([
                    TextInput::make('nombre')
                        ->required(),
                    TextInput::make('numero_serial')
                        ->required(),
                    TextInput::make('modelo')
                        ->required(),
                    TextInput::make('marca')
                        ->required(),
                    TextInput::make('color')
                        ->required(),

                    TextInput::make('descripcion')
                        ->required()
                ]),


                Section::make('Equipos')->schema([

                    Select::make('sala_id')->relationship(name: 'sala', titleAttribute: 'nombre')
                        ->searchable()
                        ->preload(),

                    Select::make('categoria_id')->relationship(name: 'categoria', titleAttribute: 'nombre')

                        ->searchable()
                        ->preload()
                        ->required(),

                    Select::make('personal_id')->relationship(name: 'personal', titleAttribute: 'nombres'),
                    Select::make('financiamiento_id')->relationship(name: 'financiamiento', titleAttribute: 'nombre')


                        ->searchable()
                        ->preload()
                        ->required(),
                    Toggle::make('active')
                        ->required(),

                ]),

            ]);
    }
}
