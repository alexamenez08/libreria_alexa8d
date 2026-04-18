<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        .container{
            font-family:Arial;
            background: #f4f4f4;
            padding: 20px;
        }

        .content{
            background: #ffff;
            padding: 20px;
            border-radius: 10px;
        }

        .btn{
            background: #007bff;
            color: #ffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    
    <center>
        <div class="container">
            <div class="content">
                <h1> Nuevo inicio de sesión detectado </h1>
                <p> Se ha detectado nueva actividad en tu cuenta </p>

                <a href="{{ route('acceso') }}" class="btn" style="color: white;">
                    Verificar actividad
                </a>

                <p style="margin-top: 20px;">
                    Si no fuiste tú, contacta con el <br>
                    administrador del sistema para solicictar un <br>
                    cambio
                </p>
            </div>
        </div>
    </center>

</body>
</html>