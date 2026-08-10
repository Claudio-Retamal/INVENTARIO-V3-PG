<?php

namespace App\Filament\Resources\TipoInsumos\Pages;

use App\Filament\Resources\TipoInsumos\TipoInsumoResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTipoInsumo extends EditRecord
{
    protected static string $resource = TipoInsumoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
