<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
//* Usar el modelo
use App\Models\Libro;
//use League\Uri\Http;


class LibroController extends Controller
{
    /**
     * //* Mostrar elementos en la base de datos
     */
    public function index()
    {
        //* Obtener información de la base de datos
        $libros = Libro::all();

        return view('libros.index', compact('libros'));
    }

    /**
     *//* Función insertar
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * //* Guardar información en la base de datos
     */
    public function store(Request $request)
    {
        //* Usa el modelo para mandar la información a la BD
        Libro::create([
            //* <NombreFormulario => $request-><NombreBD>
            'nombre' => $request->nombre,
            'autor' => $request->autor,
            'editorial' => $request->editorial,
            'precio' => $request-> precio
        ]);

        //* Redireccionar al usuario al formulario
        return redirect()->route('libros.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * //* Editar registro
     */
    public function edit(Libro $libro)
    {
        //carpeta.archivo
        //* Regresar datos del libro
        return view('libros.edit', compact('libro'));
    }

    /**
     * //* Actualizar registro
     */
    public function update(Request $request, Libro $libro)
    {
        //* Crear la validación para el formulario
        $request->validate([
            'nombre' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'precio' => 'required',
        ]);

        //* Indicar actualización de todos los campos
        $libro->update($request->all());

        //* Redirigir al usuario al index y enviarle un mensaje
        return redirect()->route('libros.index')
        ->with('success', 'Actualización exitosa');
    }

    /**
     * //* Eliminar 
     */
    public function destroy(Libro $libro)
    {
        //* Función para eliminar registro.
        $libro -> delete();

        return redirect()->route('libros.index')
        ->with('success', 'Libro eliminado');
    }

    //* Método para realizar una consulta al API
    public function home(){
        //? LIBROS DE HISTORIA
        $history = Http::get('https://www.googleapis.com/books/v1/volumes', [
            //* Incluir parámetros para el API
            'q' => 'subject:history',
            'maxResults' => 12,
            'key' => config('services.google_books.key'),
        ])->json()['items'] ?? [];

        //? LIBROS DE FANTASÍA
        $fantasy = Http::get('https://www.googleapis.com/books/v1/volumes', [
            //* Incluir parámetros para el API
            'q' => 'subject:fantasy',
            'maxResults' => 12,
            'key' => config('services.google_books.key'),
        ])->json()['items'] ?? [];


        //* Mandar la información de libros a una vista
        return view('libros.home', compact('history','fantasy'));

    }

}
