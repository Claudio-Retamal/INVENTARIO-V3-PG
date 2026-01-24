<?php

namespace App\Filament\Resources\Financiamientos;

use App\Filament\Resources\Financiamientos\Pages\CreateFinanciamiento;
use App\Filament\Resources\Financiamientos\Pages\EditFinanciamiento;
use App\Filament\Resources\Financiamientos\Pages\ListFinanciamientos;
use App\Filament\Resources\Financiamientos\Pages\ViewFinanciamiento;
use App\Filament\Resources\Financiamientos\Schemas\FinanciamientoForm;
use App\Filament\Resources\Financiamientos\Schemas\FinanciamientoInfolist;
use App\Filament\Resources\Financiamientos\Tables\FinanciamientosTable;
use App\Models\Financiamiento;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FinanciamientoResource extends Resource
{
    protected static ?string $model = Financiamiento::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Financiamiento';

    public static function form(Schema $schema): Schema
    {
        return FinanciamientoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FinanciamientoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FinanciamientosTable::configure($table);
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
            'index' => ListFinanciamientos::route('/'),
            'create' => CreateFinanciamiento::route('/create'),
            'view' => ViewFinanciamiento::route('/{record}'),
            'edit' => EditFinanciamiento::route('/{record}/edit'),
        ];
    }
}
