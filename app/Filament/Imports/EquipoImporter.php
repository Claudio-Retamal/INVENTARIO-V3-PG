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
                ->rules(['required', 'max:255']),

            ImportColumn::make('numero_serial')
                ->rules(['nullable', 'max:255']),

            ImportColumn::make('modelo'),

            ImportColumn::make('marca'),

            ImportColumn::make('color'),

            ImportColumn::make('descripcion'),

            ImportColumn::make('categoria_id')
                ->numeric()
                ->rules(['exists:categorias,id']),

            ImportColumn::make('sala_id')
                ->numeric()
                ->rules(['exists:salas,id']),

            ImportColumn::make('personal_id')
                ->numeric()
                ->rules(['exists:personals,id']),

            ImportColumn::make('financiamiento_id')
                ->numeric()
                ->rules(['exists:financiamientos,id']),
                
            ImportColumn::make('active')
                ->rules(['nullable', 'max:100']),
        ];
    }

    public function resolveRecord(): Equipo
    {
        return Equipo::firstOrNew([
            'numero_serial' => $this->data['numero_serial'],
        ]);
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
