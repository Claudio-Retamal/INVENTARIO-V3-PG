<?php

namespace App\Filament\Resources\MovimientoFungibles;

use App\Filament\Resources\MovimientoFungibles\Pages\CreateMovimientoFungible;
use App\Filament\Resources\MovimientoFungibles\Pages\EditMovimientoFungible;
use App\Filament\Resources\MovimientoFungibles\Pages\ListMovimientoFungibles;
use App\Filament\Resources\MovimientoFungibles\Pages\ViewMovimientoFungible;
use App\Filament\Resources\MovimientoFungibles\Schemas\MovimientoFungibleForm;
use App\Filament\Resources\MovimientoFungibles\Schemas\MovimientoFungibleInfolist;
use App\Filament\Resources\MovimientoFungibles\Tables\MovimientoFungiblesTable;
use App\Models\Movimiento_fungible;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MovimientoFungibleResource extends Resource
{
    protected static ?string $model = Movimiento_fungible::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Movimiento fungible';

    public static function form(Schema $schema): Schema
    {
        return MovimientoFungibleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MovimientoFungibleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MovimientoFungiblesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMovimientoFungibles::route('/'),
            'create' => CreateMovimientoFungible::route('/create'),
            'view' => ViewMovimientoFungible::route('/{record}'),
            'edit' => EditMovimientoFungible::route('/{record}/edit'),
        ];
    }

   
}
