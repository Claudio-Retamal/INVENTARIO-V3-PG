<?php

namespace App\Filament\Resources\Prestacions\Pages;

use App\Filament\Resources\Prestacions\PrestacionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPrestacion extends EditRecord
{
    protected static string $resource = PrestacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
