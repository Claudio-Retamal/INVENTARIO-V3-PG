<?php

namespace App\Filament\Resources\CategoriaFungibles\Pages;

use App\Filament\Resources\CategoriaFungibles\CategoriaFungibleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCategoriaFungibles extends ListRecords
{
    protected static string $resource = CategoriaFungibleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
