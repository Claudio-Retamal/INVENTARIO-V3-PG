<?php

namespace App\Filament\Resources\Personals\Pages;

use App\Filament\Resources\Personals\PersonalResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPersonal extends ViewRecord
{
    protected static string $resource = PersonalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
