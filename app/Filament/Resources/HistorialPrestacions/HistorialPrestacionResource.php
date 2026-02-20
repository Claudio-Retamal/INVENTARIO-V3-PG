<?php

namespace App\Filament\Resources\HistorialPrestacions;

use App\Filament\Resources\HistorialPrestacions\Pages\CreateHistorialPrestacion;
use App\Filament\Resources\HistorialPrestacions\Pages\EditHistorialPrestacion;
use App\Filament\Resources\HistorialPrestacions\Pages\ListHistorialPrestacions;
use App\Filament\Resources\HistorialPrestacions\Pages\ViewHistorialPrestacion;
use App\Filament\Resources\HistorialPrestacions\Schemas\HistorialPrestacionForm;
use App\Filament\Resources\HistorialPrestacions\Schemas\HistorialPrestacionInfolist;
use App\Filament\Resources\HistorialPrestacions\Tables\HistorialPrestacionsTable;
use App\Models\HistorialPrestacion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HistorialPrestacionResource extends Resource
{
    protected static ?string $model = HistorialPrestacion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'HistorialPrestacion';

    public static function form(Schema $schema): Schema
    {
        return HistorialPrestacionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HistorialPrestacionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HistorialPrestacionsTable::configure($table);
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
            'index' => ListHistorialPrestacions::route('/'),
            'create' => CreateHistorialPrestacion::route('/create'),
            'view' => ViewHistorialPrestacion::route('/{record}'),
            'edit' => EditHistorialPrestacion::route('/{record}/edit'),
        ];
    }
}
