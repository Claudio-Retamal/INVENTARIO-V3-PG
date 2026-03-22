<?php

namespace App\Filament\Resources\Fungibles\Pages;

use App\Filament\Resources\Fungibles\FungibleResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditFungible extends EditRecord
{
    protected static string $resource = FungibleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
