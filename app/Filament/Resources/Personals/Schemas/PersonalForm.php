<?php

namespace App\Filament\Resources\Personals\Schemas;

use App\Models\Cargo;
use App\Models\Sala;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Support\Collection;
use Ramsey\Collection\Set;

class PersonalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema

            ->components([
                Section::make('Personals')
                    ->schema([
                        TextInput::make('nombres')
                            ->required(),
                        TextInput::make('apellidos')
                            ->required(),
                    ]),

                Section::make('Asignación')
                    ->schema([
                        Select::make('sala_id')->relationship(name: 'sala', titleAttribute: 'nombre')
                            ->searchable()
                            ->preload(),
                            
                             Select::make('cargo_id')->relationship(name: 'cargo', titleAttribute: 'nombre')
                            ->searchable()
                            ->preload()
                            ->required(),
                        
                        Toggle::make('active')
                            ->required(),

                    ]),
            ]);
    }
}
