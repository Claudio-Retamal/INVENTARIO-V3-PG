<?php

namespace App\Filament\Resources\Personals\Schemas;

use Filament\Forms\Components\Select;
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

                Select::make('sala_id')->relationship(name: 'sala', titleAttribute: 'nombre')
                    ->searchable()
                    ->preload(),

                Select::make('cargo_id')->relationship(name: 'cargo', titleAttribute: 'nombre')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('cargo_id')->relationship(name: 'cargo', titleAttribute: 'nombre')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextEntry::make('salas_id')
                    ->numeric(),
                TextEntry::make('active')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
