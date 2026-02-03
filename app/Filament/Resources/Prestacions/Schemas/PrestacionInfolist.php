<?php

namespace App\Filament\Resources\Prestacions\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PrestacionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nombre'),
                TextEntry::make('motivo'),
                TextEntry::make('fecha_prestacion')
                    ->dateTime(),
                TextEntry::make('fecha_devolucion')
                    ->dateTime(),
                TextEntry::make('personal_id')
                    ->numeric(),
                TextEntry::make('equipo_id')
                    ->numeric(),
                IconEntry::make('estado')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
