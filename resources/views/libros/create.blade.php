<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Insertar</title>
</head>
<body>

    @extends('layouts.app')

    @section('content')
    <h1>Agregar nuevo libro</h1>

    <form action="{{ route('libros.store') }}" method="POST">
        <br><br>
    <!-- //* Manejo de la información por parte de Laravel-->
        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
            <input type="text" name="nombre" placeholder="Nombre" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-user"></i></span>
            <input type="text" name="autor" placeholder="Autor" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen"></i></span>
            <input type="text" name="editorial" placeholder="Editorial" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>
            <input type="number" name="precio" placeholder="Precio" class="form-control">
        </div>
        
        <br><br>
        
        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>

    </form>
    
    @endsection
</body>
</html>