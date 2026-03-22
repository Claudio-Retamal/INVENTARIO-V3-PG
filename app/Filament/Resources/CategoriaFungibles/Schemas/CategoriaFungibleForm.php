<?php

namespace App\Filament\Resources\CategoriaFungibles\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

use function Laravel\Prompts\select;

class CategoriaFungibleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Categoria fungible')->schema([
                    TextInput::make('nombre')
                            ->required(),
                    Select::make('tipo')
                        ->label('Tipo')
                        ->options([
                            'consumible' => 'Consumible',
                            'mantencion' => 'Mantención',
                        ])
                        ->required()
                        ->native(false),
                    Toggle::make('active')
                        ->required(),
                ])
            ]);
    }
}
