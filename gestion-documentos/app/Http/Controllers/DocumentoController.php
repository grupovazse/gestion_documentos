<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::orderBy('created_at', 'desc')->get();
        $tiposDocumento = Documento::getTiposDocumento();
        
        return view('documentos.index', compact('documentos', 'tiposDocumento'));
    }

    public function create()
    {
        $tiposDocumento = Documento::getTiposDocumento();
        return view('documentos.create', compact('tiposDocumento'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_documento' => 'required|string',
            'numero_documento' => 'nullable|string',
            'archivo' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240',
            'descripcion' => 'nullable|string',
            'fecha_documento' => 'nullable|date',
            'monto' => 'nullable|numeric'
        ]);

        // Subir archivo a la unidad Z:\PRUEBA
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            
            // Guardar en la unidad Z:\PRUEBA
            $rutaArchivo = $archivo->storeAs('', $nombreArchivo, 'z_drive');
        }

        Documento::create([
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'nombre_archivo' => $archivo->getClientOriginalName(),
            'ruta_archivo' => $rutaArchivo, // Esto guarda solo el nombre del archivo
            'descripcion' => $request->descripcion,
            'fecha_documento' => $request->fecha_documento,
            'monto' => $request->monto
        ]);

        return redirect()->route('documentos.index')
            ->with('success', 'Documento subido exitosamente a Z:\PRUEBA');
    }

    public function download(Documento $documento)
    {
        // Descargar desde Z:\PRUEBA
        $rutaCompleta = 'Z:/PRUEBA/' . $documento->ruta_archivo;
        
        if (!file_exists($rutaCompleta)) {
            return redirect()->back()->with('error', 'El archivo no existe en Z:\PRUEBA');
        }

        return response()->download($rutaCompleta, $documento->nombre_archivo);
    }

    public function destroy(Documento $documento)
    {
        // Eliminar archivo físico de Z:\PRUEBA
        $rutaCompleta = 'Z:/PRUEBA/' . $documento->ruta_archivo;
        
        if (file_exists($rutaCompleta)) {
            unlink($rutaCompleta);
        }
        
        // Eliminar registro de la base de datos
        $documento->delete();

        return redirect()->route('documentos.index')
            ->with('success', 'Documento eliminado exitosamente de Z:\PRUEBA');
    }
}