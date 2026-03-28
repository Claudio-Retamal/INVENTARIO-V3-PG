<?php

namespace App\Filament\Resources\Fungibles\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FungibleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
                Textarea::make('descripcion')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('marca')
                    ->default(null),
                TextInput::make('modelo')
                    ->default(null),
                 Select::make('categoria_fungible_id')->relationship(name: 'categoria_fungible', titleAttribute: 'nombre')
                            ->searchable()
                            ->preload(),

                  Select::make('unidad_medida')
                        ->label('Tipo')
                        ->options([
                            'unidad' => 'Unidad',
                            'caja' => 'Caja',
                        ])
                        ->required()
                        ->native(false),

                TextInput::make('stock_minimo')
                    ->required()
                    ->numeric()
                    ->default(0),

                      Toggle::make('active')
                            ->required(),
            ]);
    }
}
