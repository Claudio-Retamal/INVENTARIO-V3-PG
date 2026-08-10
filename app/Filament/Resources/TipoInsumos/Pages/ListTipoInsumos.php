<?php

namespace App\Filament\Resources\TipoInsumos\Pages;

use App\Filament\Resources\TipoInsumos\TipoInsumoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTipoInsumos extends ListRecords
{
    protected static string $resource = TipoInsumoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
