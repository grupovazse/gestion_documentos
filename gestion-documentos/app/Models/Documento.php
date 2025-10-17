<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'nombre_archivo',
        'ruta_archivo',
        'descripcion',
        'fecha_documento',
        'monto',
        'estado'
    ];

    protected $casts = [
        'fecha_documento' => 'date',
        'monto' => 'decimal:2'
    ];

    public static function getTiposDocumento()
    {
        return [
            'COVE' => 'COVE',
            'SEMARNAT' => 'SEMARNAT',
            'COFEPRIS' => 'COFEPRIS',
            'PROFORMA_PEDIMENTO' => 'Proforma de Pedimento',
            'NOMS' => 'NOMS',
            'PROFEPA' => 'PROFEPA',
            'AVISOS_AUTOMATICOS' => 'Avisos Automáticos',
            'UVA' => 'UVA',
            'PAGADO' => 'Pagado'
        ];
    }
}