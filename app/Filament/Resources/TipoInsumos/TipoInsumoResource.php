<?php

namespace App\Filament\Resources\TipoInsumos;

use App\Filament\Resources\TipoInsumos\Pages\CreateTipoInsumo;
use App\Filament\Resources\TipoInsumos\Pages\EditTipoInsumo;
use App\Filament\Resources\TipoInsumos\Pages\ListTipoInsumos;
use App\Filament\Resources\TipoInsumos\Pages\ViewTipoInsumo;
use App\Filament\Resources\TipoInsumos\Schemas\TipoInsumoForm;
use App\Filament\Resources\TipoInsumos\Schemas\TipoInsumoInfolist;
use App\Filament\Resources\TipoInsumos\Tables\TipoInsumosTable;
use App\Models\TipoInsumo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TipoInsumoResource extends Resource
{
    protected static ?string $model = TipoInsumo::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'TipoInsumo';

    public static function form(Schema $schema): Schema
    {
        return TipoInsumoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TipoInsumoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TipoInsumosTable::configure($table);
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
            'index' => ListTipoInsumos::route('/'),
            'create' => CreateTipoInsumo::route('/create'),
            'view' => ViewTipoInsumo::route('/{record}'),
            'edit' => EditTipoInsumo::route('/{record}/edit'),
        ];
    }
}
