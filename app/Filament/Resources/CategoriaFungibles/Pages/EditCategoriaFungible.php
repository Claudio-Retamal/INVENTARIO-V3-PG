<?php

namespace App\Filament\Resources\CategoriaFungibles\Pages;

use App\Filament\Resources\CategoriaFungibles\CategoriaFungibleResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCategoriaFungible extends EditRecord
{
    protected static string $resource = CategoriaFungibleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
