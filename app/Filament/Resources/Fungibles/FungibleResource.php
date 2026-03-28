<?php

namespace App\Filament\Resources\Fungibles;

use App\Filament\Resources\Fungibles\Pages\CreateFungible;
use App\Filament\Resources\Fungibles\Pages\EditFungible;
use App\Filament\Resources\Fungibles\Pages\ListFungibles;
use App\Filament\Resources\Fungibles\Pages\ViewFungible;
use App\Filament\Resources\Fungibles\Schemas\FungibleForm;
use App\Filament\Resources\Fungibles\Schemas\FungibleInfolist;
use App\Filament\Resources\Fungibles\Tables\FungiblesTable;
use App\Models\Fungible;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FungibleResource extends Resource
{
    protected static ?string $model = Fungible::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Ingreso de Fungible';

    public static function getNavigationGroup(): ?string
    {
        return 'Fungibles';
    }

    public static function form(Schema $schema): Schema
    {
        return FungibleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FungibleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FungiblesTable::configure($table);
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
            'index' => ListFungibles::route('/'),
            'create' => CreateFungible::route('/create'),
            'view' => ViewFungible::route('/{record}'),
            'edit' => EditFungible::route('/{record}/edit'),
        ];
    }
}
