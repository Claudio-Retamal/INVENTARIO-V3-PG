<?php

namespace App\Filament\Resources\MovimientoFungibles\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MovimientoFungibleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('tipo'),
                TextEntry::make('fecha')
                    ->date(),
                TextEntry::make('fungible_id')
                    ->numeric(),
                TextEntry::make('personal_id')
                    ->numeric(),
                TextEntry::make('sala_id')
                    ->numeric(),
                TextEntry::make('cantidad')
                    ->numeric(),
                TextEntry::make('stock_anterior')
                    ->numeric(),
                TextEntry::make('stock_actual')
                    ->numeric(),
                TextEntry::make('motivo'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
