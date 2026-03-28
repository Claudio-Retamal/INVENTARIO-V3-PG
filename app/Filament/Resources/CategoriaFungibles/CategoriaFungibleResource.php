<?php

namespace App\Filament\Resources\CategoriaFungibles;

use App\Filament\Resources\CategoriaFungibles\Pages\CreateCategoriaFungible;
use App\Filament\Resources\CategoriaFungibles\Pages\EditCategoriaFungible;
use App\Filament\Resources\CategoriaFungibles\Pages\ListCategoriaFungibles;
use App\Filament\Resources\CategoriaFungibles\Pages\ViewCategoriaFungible;
use App\Filament\Resources\CategoriaFungibles\Schemas\CategoriaFungibleForm;
use App\Filament\Resources\CategoriaFungibles\Schemas\CategoriaFungibleInfolist;
use App\Filament\Resources\CategoriaFungibles\Tables\CategoriaFungiblesTable;
use App\Models\Categoria_fungible;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CategoriaFungibleResource extends Resource
{


    protected static ?string $model = Categoria_fungible::class;

    protected static ?string $modelLabel = 'Categoria fungible';
    protected static ?string $pluralModelLabel = 'Categorias fungibles';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    public static function getNavigationGroup(): ?string
    {
        return 'Fungibles';
    }

    public static function form(Schema $schema): Schema
    {
        return CategoriaFungibleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CategoriaFungibleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CategoriaFungiblesTable::configure($table);
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
            'index' => ListCategoriaFungibles::route('/'),
            'create' => CreateCategoriaFungible::route('/create'),
            'view' => ViewCategoriaFungible::route('/{record}'),
            'edit' => EditCategoriaFungible::route('/{record}/edit'),
        ];
    }
}
