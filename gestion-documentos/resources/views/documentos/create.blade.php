@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-upload me-2"></i>Subir Nuevo Documento
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tipo_documento" class="form-label">Tipo de Documento *</label>
                            <select class="form-select" id="tipo_documento" name="tipo_documento" required>
                                <option value="">Seleccionar tipo...</option>
                                @foreach($tiposDocumento as $key => $value)
                                    <option value="{{ $key }}" {{ old('tipo_documento') == $key ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="numero_documento" class="form-label">Número de Documento</label>
                            <input type="text" class="form-control" id="numero_documento" 
                                   name="numero_documento" value="{{ old('numero_documento') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="archivo" class="form-label">Archivo *</label>
                        <input type="file" class="form-control" id="archivo" name="archivo" 
                               accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png" required>
                        <div class="form-text">
                            Formatos permitidos: PDF, Word, Excel, JPG, PNG (Máx. 10MB)
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" 
                                  rows="3">{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fecha_documento" class="form-label">Fecha del Documento</label>
                            <input type="date" class="form-control" id="fecha_documento" 
                                   name="fecha_documento" value="{{ old('fecha_documento') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="monto" class="form-label">Monto</label>
                            <input type="number" step="0.01" class="form-control" id="monto" 
                                   name="monto" value="{{ old('monto') }}" placeholder="0.00">
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('documentos.index') }}" class="btn btn-secondary me-md-2">
                            <i class="fas fa-arrow-left me-2"></i>Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Guardar Documento
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection