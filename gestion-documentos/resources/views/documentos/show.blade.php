@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Detalle del Documento</h4>
                    <a href="{{ route('documentos.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Información del Documento</h6>
                        <table class="table table-bordered">
                            <tr>
                                <th>Tipo:</th>
                                <td>
                                    <span class="badge bg-info">
                                        {{ $tiposDocumento[$documento->tipo_documento] ?? $documento->tipo_documento }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Número:</th>
                                <td>{{ $documento->numero_documento ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Archivo:</th>
                                <td>
                                    <i class="fas fa-file-pdf text-danger"></i>
                                    {{ $documento->nombre_archivo }}
                                </td>
                            </tr>
                            <tr>
                                <th>Fecha:</th>
                                <td>{{ $documento->fecha_documento?->format('d/m/Y') ?? 'N/A' }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Detalles Adicionales</h6>
                        <table class="table table-bordered">
                            <tr>
                                <th>Monto:</th>
                                <td>
                                    @if($documento->monto)
                                        ${{ number_format($documento->monto, 2) }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Estado:</th>
                                <td>
                                    <span class="badge bg-{{ $documento->estado == 'aprobado' ? 'success' : 'warning' }}">
                                        {{ ucfirst($documento->estado) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Subido:</th>
                                <td>{{ $documento->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if($documento->descripcion)
                <div class="row mt-3">
                    <div class="col-12">
                        <h6>Descripción:</h6>
                        <div class="border p-3 rounded">
                            {{ $documento->descripcion }}
                        </div>
                    </div>
                </div>
                @endif

                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <a href="{{ route('documentos.download', $documento) }}" 
                           class="btn btn-primary me-2">
                            <i class="fas fa-download"></i> Descargar Archivo
                        </a>
                        <form action="{{ route('documentos.destroy', $documento) }}" 
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" 
                                    onclick="return confirm('¿Estás seguro de eliminar este documento?')">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection