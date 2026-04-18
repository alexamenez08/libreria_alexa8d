<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
</head>
<body>
    
    <h1>LIBROS DISPONIBLES</h1>

    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
        @foreach($fantasy as $libro)

            <div style="width: 200px;">
                <h3>
                    {{ $libro['volumeInfo']['title'] ?? 'Sin titulo' }}
                </h3>

                <!-- Autor del libro -->
                 <p>
                    {{ $libro['volumeInfo']['authors'][0] ?? 'Autor desconocido' }}
                 </p>

                <!-- Portada del libro -->
                 @if(isset($libro['volumeInfo']['imageLinks']['thumbnail']))
                    <img src="{{ $libro['volumeInfo']['imageLinks']['thumbnail'] }}">
                 @endif
            </div>

        @endforeach
    </div>

</body>
</html>