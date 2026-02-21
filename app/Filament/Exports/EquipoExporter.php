<?php

namespace App\Filament\Exports;

use App\Models\Equipo;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Exp;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\Exponential;

class EquipoExporter extends Exporter
{
    protected static ?string $model = Equipo::class;

    public static function getColumns(): array
    {

        //get columns from model

        return [
            ExportColumn::make('nombre'),
            ExportColumn::make('numero_serial'),
            ExportColumn::make('modelo'),
            ExportColumn::make('marca'),
            ExportColumn::make('color'),
            ExportColumn::make('descripcion'),
            ExportColumn::make('categoria.nombre')->label('Categoría'),
            ExportColumn::make('sala.nombre')->label('Sala'),
            ExportColumn::make('personal.nombre')->label('Personal'),
            ExportColumn::make('financiamiento.nombre')->label('Financiamiento'),   
            ExportColumn::make('active')->label('Prestado'),     
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your equipo export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
