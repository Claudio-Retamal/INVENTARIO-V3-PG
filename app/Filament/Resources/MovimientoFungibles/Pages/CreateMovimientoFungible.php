<?php

namespace App\Filament\Resources\MovimientoFungibles\Pages;

use App\Filament\Resources\MovimientoFungibles\MovimientoFungibleResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\DB;

class CreateMovimientoFungible extends CreateRecord
{
    protected static string $resource = MovimientoFungibleResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return DB::transaction(function () use ($data) {

            // 🔒 Obtener fungible con bloqueo
            $fungible = \App\Models\Fungible::lockForUpdate()->find($data['fungible_id']);

            if (!$fungible) {
                throw new \Exception('Fungible no encontrado');
            }

            // 📦 STOCK ACTUAL
            $stockAnterior = (int) $fungible->stock_actual;

            // 🔄 CALCULAR NUEVO STOCK
            if ($data['tipo'] === 'entrada') {

                $stockActual = $stockAnterior + (int)$data['cantidad'];
            } elseif ($data['tipo'] === 'salida') {

            

                if ($stockAnterior >= $data['cantidad']) {

                $stockActual = $stockAnterior - (int)$data['cantidad'];

                } else {    


                    Notification::make()
                        ->title('Stock agotado')
                        ->body("⚠️ '{$fungible->nombre}' ya no tiene stock disponible")
                        ->danger()
                        ->icon('heroicon-o-exclamation-triangle')
                        ->persistent()
                        ->send();
                }

            } elseif ($data['tipo'] === 'ajuste') {

                $stockActual = (int)$data['cantidad'];
            } else {
                throw new \Exception('Tipo inválido');
            }

            // 🔥 ACTUALIZAR STOCK EN TABLA FUNGIBLES (CLAVE)
            $fungible->stock_actual = $stockAnterior;
            $fungible->save();



            // 🔥 GUARDAR EN MOVIMIENTO
            $data['stock_anterior'] = $stockAnterior;
            $data['stock_actual'] = $stockAnterior;

            if ($fungible->stock_actual <= 0) {

                Notification::make()
                    ->title('Stock agotado')
                    ->body("⚠️ '{$fungible->nombre}' ya no tiene stock disponible")
                    ->danger()
                    ->icon('heroicon-o-exclamation-triangle')
                    ->persistent()
                    ->send();
            } else {
                Notification::make()
                    ->title('existencias actualizadas')
                    ->body(" '{$fungible->stock_actual}' disponible")
                    ->danger()
                    ->icon('heroicon-s-arrow-right-circle')
                    ->persistent()
                    ->send();
            }

            return $data;
        });
    }
}
