<?php

namespace App\Filament\Resources\HistorialPrestacions\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class HistorialPrestacionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('fecha_prestacion')
                    ->dateTime(),
                TextEntry::make('fecha_devolucion')
                    ->dateTime(),
                TextEntry::make('personal_id')
                    ->numeric(),
                TextEntry::make('cargo_id')
                    ->numeric(),
                TextEntry::make('sala_id')
                    ->numeric(),
                TextEntry::make('equipo_id')
                    ->numeric(),
                IconEntry::make('active')
                    ->boolean(),
            ]);
    }
}
