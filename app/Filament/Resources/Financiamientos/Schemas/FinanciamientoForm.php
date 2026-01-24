<?php

namespace App\Filament\Resources\Financiamientos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FinanciamientoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Financiamiento')->schema([
                    TextInput::make('nombre')
                        ->required(),

                    Select::make('type')->label('Seleccione Financiamiento')
                        ->options([
                            'SEP' => 'SEP',
                            'FAEP' => 'FAEP',
                            'DONACIÓN' => 'DONACIÓN',
                        ])->required()->native(false)
                        ->searchable(),

                    TextInput::make('monto')
                        ->required()
                        ->numeric(),
                    Toggle::make('activo')
                        ->required()

                ])
            ]);
    }
}
