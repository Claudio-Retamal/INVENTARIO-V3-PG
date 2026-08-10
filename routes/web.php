<?php

use App\Models\Prestacion;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;





Route::get('/snmp-test', function () {
    return extension_loaded('snmp')
        ? 'SNMP habilitado'
        : 'SNMP NO habilitado';
});