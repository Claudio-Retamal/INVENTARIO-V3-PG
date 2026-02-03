<?php

namespace App\Filament\Resources\Prestacions\Pages;

use App\Filament\Resources\Prestacions\PrestacionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPrestacions extends ListRecords
{
    protected static string $resource = PrestacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
