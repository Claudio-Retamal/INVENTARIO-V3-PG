<?php

namespace App\Filament\Resources\MovimientoFungibles;

use App\Filament\Resources\MovimientoFungibles\Pages\CreateMovimientoFungible;
use App\Filament\Resources\MovimientoFungibles\Pages\EditMovimientoFungible;
use App\Filament\Resources\MovimientoFungibles\Pages\ListMovimientoFungibles;
use App\Filament\Resources\MovimientoFungibles\Schemas\MovimientoFungibleForm;
use App\Filament\Resources\MovimientoFungibles\Tables\MovimientoFungiblesTable;
use App\Models\Movimiento_Fungible;
use App\Models\MovimientoFungible;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MovimientoFungibleResource extends Resource
{
    protected static ?string $model = Movimiento_Fungible::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Movimiento_Fungible';

    public static function form(Schema $schema): Schema
    {
        return MovimientoFungibleForm::configure($schema);
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
            'edit' => EditMovimientoFungible::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
