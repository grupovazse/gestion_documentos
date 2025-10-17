<?php

use App\Http\Controllers\DocumentoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('documentos.index');
});

Route::resource('documentos', DocumentoController::class);

// Ruta adicional para descargar archivos
Route::get('documentos/{documento}/download', [DocumentoController::class, 'download'])
    ->name('documentos.download');