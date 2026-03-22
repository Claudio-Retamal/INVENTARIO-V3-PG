<?php

namespace App\Filament\Resources\Fungibles\Pages;

use App\Filament\Resources\Fungibles\FungibleResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFungible extends ViewRecord
{
    protected static string $resource = FungibleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
