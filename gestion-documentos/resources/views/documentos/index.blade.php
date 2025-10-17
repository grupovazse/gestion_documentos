@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>
                <i class="fas fa-file-alt me-2"></i>Documentos Registrados
            </h2>
            <a href="{{ route('documentos.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Nuevo Documento
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Tipo Documento</th>
                                <th>Número</th>
                                <th>Archivo</th>
                                <th>Fecha</th>
                                <th>Monto</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($documentos as $documento)
                                <tr>
                                    <td>
                                        <span class="badge bg-primary">{{ $tiposDocumento[$documento->tipo_documento] }}</span>
                                    </td>
                                    <td>{{ $documento->numero_documento ?? 'N/A' }}</td>
                                    <td>
                                        <i class="fas fa-file-pdf text-danger me-2"></i>
                                        {{ $documento->nombre_archivo }}
                                    </td>
                                    <td>{{ $documento->fecha_documento?->format('d/m/Y') ?? 'N/A' }}</td>
                                    <td>
                                        @if($documento->monto)
                                            <span class="fw-bold text-success">${{ number_format($documento->monto, 2) }}</span>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $estadoClass = match($documento->estado) {
                                                'aprobado' => 'success',
                                                'rechazado' => 'danger',
                                                default => 'warning'
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $estadoClass }}">{{ ucfirst($documento->estado) }}</span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('documentos.download', $documento) }}" 
                                               class="btn btn-sm btn-outline-primary" title="Descargar">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="{{ route('documentos.show', $documento) }}" 
                                               class="btn btn-sm btn-outline-info" title="Ver Detalles">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="{{ route('documentos.destroy', $documento) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                        onclick="return confirm('¿Estás seguro de eliminar este documento?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="fas fa-folder-open fa-3x mb-3 d-block"></i>
                                            <h5>No hay documentos registrados</h5>
                                            <p class="mb-0">Comienza subiendo tu primer documento</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection