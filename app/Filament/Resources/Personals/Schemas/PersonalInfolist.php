<?php

namespace App\Filament\Resources\Personals\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PersonalInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nombres'),
                TextEntry::make('apellidos'),
                TextEntry::make('cargos_id')
                    ->numeric(),
                TextEntry::make('salas_id')
                    ->numeric(),
                TextEntry::make('estado')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
