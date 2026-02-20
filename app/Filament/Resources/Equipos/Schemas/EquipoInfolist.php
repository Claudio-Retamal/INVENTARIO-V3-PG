<?php

namespace App\Filament\Resources\Equipos\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EquipoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nombre'),
                TextEntry::make('numero_serial'),
                TextEntry::make('modelo'),
                TextEntry::make('marca'),
                TextEntry::make('color'),
                TextEntry::make('descripcion'),
                TextEntry::make('categoria_id')
                    ->numeric(),
                TextEntry::make('sala_id')
                    ->numeric(),
                TextEntry::make('cargo_id')
                    ->numeric(),
                TextEntry::make('personal_id')
                    ->numeric(),

                TextEntry::make('financiamiento_id')
                    ->numeric(),
                IconEntry::make('active')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
