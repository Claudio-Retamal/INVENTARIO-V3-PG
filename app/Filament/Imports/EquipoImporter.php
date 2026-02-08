<?php

namespace App\Filament\Imports;

use App\Models\Equipo;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class EquipoImporter extends Importer
{
    protected static ?string $model = Equipo::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nombre')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('numero_serial')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('modelo')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('marca')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('color')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('descripcion')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('categoria_id')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('sala_id')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('personal_id')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('estado')
                ->requiredMapping()
                ->boolean()
                ->rules(['required', 'boolean']),
        ];
    }

    public function resolveRecord(): Equipo
    {
        return new Equipo();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your equipo import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
