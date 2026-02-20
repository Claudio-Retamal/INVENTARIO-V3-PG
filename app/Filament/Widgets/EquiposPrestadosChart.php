<?php

namespace App\Filament\Widgets;

use App\Models\Equipo;
use Filament\Widgets\ChartWidget;

class EquiposPrestadosChart extends ChartWidget
{
    protected ?string $heading = 'Equipos Prestados Chart';

    protected function getData(): array
    {
        $prestados = Equipo::where('active', true)->count();

        return [
            //
            'datasets' => [
                [
                    'label' => 'Equipos',
                    'data' => [$prestados],
                    'backgroundColor' => [
                        '#ef4444', // rojo

                    ],
                ],
            ],
            'labels' => [
                'Prestados',
            ],



        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
