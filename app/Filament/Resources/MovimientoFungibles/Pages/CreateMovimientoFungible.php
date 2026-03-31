<?php

namespace App\Filament\Resources\MovimientoFungibles\Pages;

use App\Filament\Resources\MovimientoFungibles\MovimientoFungibleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMovimientoFungible extends CreateRecord
{
    protected static string $resource = MovimientoFungibleResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $fungible = \App\Models\Fungible::find($data['fungible_id']);

        if (!$fungible) {
            throw new \Exception('Fungible no encontrado');
        }

        $stockAnterior = (int) ($fungible->stock_actual ?? 0);

        // 🚨 VALIDACIÓN REAL
        if ($data['tipo'] === 'salida' && $data['cantidad'] > $stockAnterior) {
            throw new \Exception('Stock insuficiente');
        }

        $stockActual = $data['tipo'] === 'entrada'
            ? $stockAnterior + $data['cantidad']
            : $stockAnterior - $data['cantidad'];

        // Guardar en el movimiento
        $data['stock_anterior'] = $stockAnterior;
        $data['stock_actual'] = $stockActual;

        // ⚠️ ALERTA (opcional)
        if ($stockActual <= $fungible->stock_minimo) {
            \Filament\Notifications\Notification::make()
                ->title('Stock bajo')
                ->warning()
                ->body('El stock está por debajo del mínimo')
                ->send();
        }

        // 🔥 ACTUALIZAR STOCK REAL
        $fungible->update([
            'stock' => $stockActual
        ]);

        return $data;
    }
}
