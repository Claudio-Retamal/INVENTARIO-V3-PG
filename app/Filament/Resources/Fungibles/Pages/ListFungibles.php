<?php

namespace App\Filament\Resources\Fungibles\Pages;

use App\Filament\Resources\Fungibles\FungibleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFungibles extends ListRecords
{
    protected static string $resource = FungibleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
