<?php

namespace App\Filament\Resources\Fungibles\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class FungibleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nombre'),
                TextEntry::make('marca'),
                TextEntry::make('modelo'),
                TextEntry::make('categoria_id')
                    ->numeric(),
                TextEntry::make('unidad_medida'),
                TextEntry::make('stock_minimo')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
