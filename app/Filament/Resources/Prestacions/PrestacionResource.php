<?php

namespace App\Filament\Resources\Prestacions;

use App\Filament\Resources\Prestacions\Pages\CreatePrestacion;
use App\Filament\Resources\Prestacions\Pages\EditPrestacion;
use App\Filament\Resources\Prestacions\Pages\ListPrestacions;
use App\Filament\Resources\Prestacions\Pages\ViewPrestacion;
use App\Filament\Resources\Prestacions\Schemas\PrestacionForm;
use App\Filament\Resources\Prestacions\Schemas\PrestacionInfolist;
use App\Filament\Resources\Prestacions\Tables\PrestacionsTable;
use App\Models\Prestacion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PrestacionResource extends Resource
{
    protected static ?string $model = Prestacion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Prestacion';

    public static function form(Schema $schema): Schema
    {
        return PrestacionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PrestacionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PrestacionsTable::configure($table);
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
            'index' => ListPrestacions::route('/'),
            'create' => CreatePrestacion::route('/create'),
            'view' => ViewPrestacion::route('/{record}'),
            'edit' => EditPrestacion::route('/{record}/edit'),
        ];
    }
}
