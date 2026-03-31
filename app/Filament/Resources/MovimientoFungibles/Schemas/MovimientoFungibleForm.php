<?php

namespace App\Filament\Resources\MovimientoFungibles\Schemas;

use App\Models\Fungible;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;


class MovimientoFungibleForm
{

    protected static function calcularStock(callable $get, callable $set): void
    {
        $fungibleId = $get('fungible_id');
        $cantidad = (int) $get('cantidad');
        $tipo = $get('tipo');

        if (!$fungibleId || !$cantidad || !$tipo) {
            return;
        }

        $fungible = \App\Models\Fungible::find($fungibleId);

        if (!$fungible) {
            return;
        }

        $stockAnterior = (int) ($fungible->stock_actual ?? 0);
        $stockMinimo = (int) ($fungible->stock_minimo ?? 0);

        // 🚨 VALIDACIÓN REAL (única que bloquea)
        if ($tipo === 'salida' && $cantidad > $stockAnterior) {
            $set('stock_minimo', $stockAnterior);
            $set('stock_actual', $stockAnterior);

            \Filament\Notifications\Notification::make()
                ->title('Stock insuficiente')
                ->body("Disponible: {$stockAnterior}")
                ->danger()
                ->send();

            return;
        }

        // ✅ Cálculo correcto
        $stockActual = $tipo === 'entrada'
            ? $stockAnterior + $cantidad
            : $stockAnterior - $cantidad;

        // 📌 Setear valores SIEMPRE
        $set('stock_minimo', $stockAnterior);
        $set('stock_actual', $stockActual);

        // ⚠️ ALERTA (NO BLOQUEA)
        if ($stockActual <= $stockMinimo) {
            \Filament\Notifications\Notification::make()
                ->title('Stock bajo')
                ->body("Stock actual: {$stockActual} | Mínimo: {$stockMinimo}")
                ->warning()
                ->send();
        }
    }
    public static function configure(Schema $schema): Schema
    {

        return $schema
            ->components([
                //
                Select::make('fungible_id')
                    ->relationship('fungible', 'nombre')
                    ->label('Fungible')
                    ->searchable()
                    ->preload()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $fungible = Fungible::find($state);
                        if ($fungible) {
                            $set('stock_minimo', $fungible->stock);
                            $set('stock_actual', $fungible->stock);
                        }
                    })
                    ->required(),

                TextInput::make('cantidad')
                    ->label('Cantidad')
                    ->numeric()
                    ->reactive()
                    ->afterStateUpdated(
                        fn($state, callable $set, callable $get) =>
                        self::calcularStock($get, $set)
                    )
                    ->required(),

                Select::make('tipo')
                    ->label('Tipo')
                    ->options([
                        'entrada' => 'Entrada',
                        'salida' => 'Salida',
                    ])
                    ->reactive()
                    ->afterStateUpdated(
                        fn($state, callable $set, callable $get) =>
                        self::calcularStock($get, $set)
                    )
                    ->required(),

                DateTimePicker::make('fecha')
                    ->default(now())
                    ->required(),

                Select::make('personal_id')
                    ->relationship('personal', 'nombres')
                    ->searchable(['nombres', 'apellidos'])
                    ->preload()
                    ->required(),

                Select::make('sala_id')
                    ->relationship('sala', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('stock_minimo')
                    ->numeric()
                    ->disabled()
                    ->dehydrated(), // se guarda igual

                TextInput::make('stock_actual')
                    ->numeric()
                    ->disabled()
                    ->dehydrated(),

                Textarea::make('motivo')
                    ->rows(3)
                    ->columnSpanFull(),
            ])->columns(2);
    }
}
