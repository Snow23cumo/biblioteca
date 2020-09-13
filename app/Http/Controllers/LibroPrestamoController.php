<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Models\LibroPrestamo;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\ValidacionLibroPrestamo;


class LibroPrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = LibroPrestamo::with('usuario:id,nombre', 'libro')->orderBy('fecha_prestamo')->get();
        return view('libro-prestamo.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $libros = Libro::withCount(['prestamo'  => function (Builder $query) {
            $query->whereNull('fecha_devolucion');
        }])->get()->filter(function ($item, $key) {
            return $item->cantidad > $item->prestamo_count;
        })->pluck('titulo', 'id');
        return view('libro-prestamo.crear', compact('libros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionLibroPrestamo $request)
    {
        
        $libro = Libro::findOrFail($request->libro_id);
        $libro->prestamo()->create([
            'prestado_a' => $request->prestado_a,
            'fecha_prestamo' => $request->fecha_prestamo,
            'usuario_id' => auth()->user()->id
        ]);

        return redirect()->route('libro-prestamo')->with('mensaje', 'El libro prestado se registró');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function devolucion(Request $request, $libro_id)
    {
        if ($request->ajax()) {
            LibroPrestamo::where('libro_id', $libro_id)
            ->whereNull('fecha_devolucion')
            ->update(['fecha_devolucion' => date('Y-m-d')]);
            return response()->json(['fecha_devolucion' => date('Y-m-d')]);
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        //
    }
}
