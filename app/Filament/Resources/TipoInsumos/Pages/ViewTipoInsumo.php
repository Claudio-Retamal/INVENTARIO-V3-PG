<?php

namespace App\Filament\Resources\TipoInsumos\Pages;

use App\Filament\Resources\TipoInsumos\TipoInsumoResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTipoInsumo extends ViewRecord
{
    protected static string $resource = TipoInsumoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
