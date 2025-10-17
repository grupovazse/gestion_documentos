<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_documento', [
                'COVE',
                'SEMARNAT', 
                'COFEPRIS',
                'PROFORMA_PEDIMENTO',
                'NOMS',
                'PROFEPA',
                'AVISOS_AUTOMATICOS',
                'UVA',
                'PAGADO'
            ]);
            $table->string('numero_documento')->nullable();
            $table->string('referencia')->nullable();
            $table->string('nombre_archivo');
            $table->string('ruta_archivo');
            $table->text('descripcion')->nullable();
            $table->date('fecha_documento')->nullable();
            $table->decimal('monto', 10, 2)->nullable();
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente');
            $table->enum('documentos_recibidos', ['si', 'no'])->default('no');
            $table->date('fecha_recepcion')->nullable();
            $table->enum('proforma', ['si', 'no'])->default('no');
            $table->string('proforma_archivo')->nullable();
            $table->enum('solicitud_uva', ['si', 'no'])->default('no');
            $table->string('solicitud_uva_archivo')->nullable();
            $table->enum('pedimento', ['si', 'no'])->default('no');
            $table->string('pedimento_archivo')->nullable();
            $table->string('pedimento_simplificado_archivo')->nullable();
            $table->decimal('monto_pagado_pedimento', 10, 2)->nullable();
            $table->enum('cove', ['si', 'no'])->default('no');
            $table->string('cove_archivo')->nullable();
            $table->enum('semarnat', ['si', 'no'])->default('no');
            $table->string('semarnat_archivo')->nullable();
            $table->enum('cofepris', ['si', 'no'])->default('no');
            $table->string('cofepris_archivo')->nullable();
            $table->enum('noms', ['si', 'no'])->default('no');
            $table->string('noms_archivo')->nullable();
            $table->enum('profepa', ['si', 'no'])->default('no');
            $table->string('profepa_archivo')->nullable();
            $table->enum('avisos_automaticos', ['si', 'no'])->default('no');
            $table->string('avisos_automaticos_archivo')->nullable();
            $table->enum('deposito_maniobras', ['si', 'no'])->default('no');
            $table->string('deposito_maniobras_archivo')->nullable();
            $table->decimal('monto_deposito_maniobras', 10, 2)->nullable();
            $table->enum('cotizacion', ['si', 'no'])->default('no');
            $table->string('cotizacion_archivo')->nullable();
            $table->decimal('monto_cotizacion', 10, 2)->nullable();
            $table->enum('deposito_impuesto', ['si', 'no'])->default('no');
            $table->string('deposito_impuesto_archivo')->nullable();
            $table->decimal('monto_deposito_impuesto', 10, 2)->nullable();
            $table->enum('status_despacho', ['activo', 'despachado', 'investigacion', 'no_efectuado'])->default('activo');
            $table->integer('dias_piso')->default(0);
            $table->date('fecha_arribo')->nullable();
            $table->date('fecha_despachado')->nullable();
            $table->date('ultima_fecha_calculo')->nullable();
            $table->text('comentario_glosa')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documentos');
    }
};