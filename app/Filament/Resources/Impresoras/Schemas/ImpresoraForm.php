<?php

namespace App\Filament\Resources\Impresoras\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

use function Laravel\Prompts\select;

class ImpresoraForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('modelo')
                    ->required(),
                TextInput::make('serie')
                    ->required(),
                TextInput::make('tipo_impresora')
                    ->required(),

                Select::make('insumo_id')
                    ->label('Insumo')
                    ->relationship('insumo', 'nombre')
                    ->required()
                    ->searchable()
                    ->preload(),


                DatePicker::make('fecha_ingreso')
                    ->required(),

                select::make('estado_impresora')
                    ->options([
                        'Nueva' => 'nueva',
                        'Usada' => 'usada',
                    ])
                     ->default('draft') // Es buena práctica definir un valor inicial
                    ->selectablePlaceholder(false),

                  
                    

                Toggle::make('estado')
                    ->required(),
            ]);
    }
}
