<?php

namespace App\Filament\Resources\Equipos\Tables;

use App\Filament\Exports\EquipoExporter;
use App\Models\Prestacion;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use App\Filament\Imports\EquipoImporter;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;

class EquiposTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->searchable(),
                TextColumn::make('numero_serial')
                    ->searchable(),
                TextColumn::make('modelo')
                    ->searchable(),
                TextColumn::make('marca')
                    ->searchable(),
                TextColumn::make('color')
                    ->searchable(),
                TextColumn::make('descripcion')
                    ->searchable(),
                TextColumn::make('categoria.nombre')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('sala.nombre')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('financiamiento.nombre')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('personal.nombres')
                    ->numeric()
                    ->sortable(),
                ToggleColumn::make('active')
                    ->label('estado')
                    ->onColor('success')
                    ->offColor('danger')
                    ->onIcon('heroicon-o-arrow-up')
                    ->offIcon('heroicon-o-arrow-down'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->recordActions([
                Action::make('prestar')
                    ->label(function ($record) {
                        return Prestacion::where('equipo_id', $record->id)
                            ->where('active', true)
                            ->exists()
                            ? 'Reservado'
                            : 'Prestar';
                    })

                    ->icon('heroicon-o-clipboard-document-check')

                    ->color(function ($record) {
                        return Prestacion::where('equipo_id', $record->id)
                            ->where('active', true)
                            ->exists()
                            ? 'danger'
                            : 'success';
                    })

                    // 🔒 DESHABILITAR SI ESTÁ PRESTADO
                    ->disabled(function ($record) {
                        return Prestacion::where('equipo_id', $record->id)
                            ->where('active', true)
                            ->exists();
                    })

                    // 💬 TOOLTIP
                    ->tooltip(function ($record) {
                        return Prestacion::where('equipo_id', $record->id)
                            ->where('active', true)
                            ->exists()
                            ? 'Este equipo ya está prestado'
                            : 'Disponible para préstamo';
                    })

                    ->modalHeading('Prestación de equipo')
                    ->form([

                        TextInput::make('nombre')
                            ->label('Nombre de la prestación')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('motivo')
                            ->label('Motivo')
                            ->required()
                            ->maxLength(255),

                        Select::make('personal_id')
                            ->label('Personal')
                            ->relationship('personal', 'nombres')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('sala_id')
                            ->label('Sala')
                            ->relationship('Sala', 'nombre')
                            ->searchable()
                            ->preload()
                            ->required(),

                        DatePicker::make('fecha_prestacion')
                            ->label('Fecha de préstamo')
                            ->default(now())
                            ->required(),

                        DatePicker::make('fecha_devolucion')
                            ->afterOrEqual('fecha_prestacion')
                            ->label('Fecha de devolución')
                            ->required()
                            ->after('fecha_prestacion'),

                        Textarea::make('observacion')
                            ->label('Observaciones')
                            ->rows(3),
                    ])
                    ->action(function (array $data, $record) {

                        $existePrestamo = Prestacion::where('equipo_id', $record->id)
                            ->where('active', true)
                            ->where('fecha_prestacion', '<=', $data['fecha_devolucion'])
                            ->where('fecha_devolucion', '>=', $data['fecha_prestacion'])
                            ->exists();

                        if ($existePrestamo) {
                            Notification::make()
                                ->title('Fecha no disponible')
                                ->body('Este equipo ya está reservado en el rango de fechas seleccionado.')
                                ->danger()
                                ->send();

                            return;
                        }

                        Prestacion::create([
                            'equipo_id'        => $record->id,
                            'personal_id'      => $data['personal_id'],
                            'sala_id'          => $data['sala_id'],
                            'nombre'           => $data['nombre'],
                            'motivo'           => $data['motivo'],
                            'fecha_prestacion' => $data['fecha_prestacion'],
                            'fecha_devolucion' => $data['fecha_devolucion'],
                            'observacion'      => $data['observacion'] ?? null,
                            'active'           => true,
                        ]);

                        $record->update([
                            'active' => true,
                        ]);

                        Notification::make()
                            ->title('Préstamo registrado correctamente')
                            ->success()
                            ->send();
                    })




            ])

            ->headerActions([
                ImportAction::make()
                    ->importer(EquipoImporter::class),

                ExportAction::make()
                    ->exporter(EquipoExporter::class)
            ])


            ->toolbarActions([

                BulkActionGroup::make([


                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
