<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hospital X</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <style>
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #1155F8;
            display: flex;
            flex-direction: column; /* Colocar elementos en columna */
            justify-content: space-between; /* Espacio entre los elementos */
            padding-top: 20px;
        }

        .sidebar p {
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            color: #fff;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
        }

        /* Estilo adicional para el botón de "Salir" */
        .logout-button {
            margin: 10px; /* Añadir margen arriba del botón */
        }
    </style>
    
</head>
<body>


    <!-- Barra lateral -->
    <div class="sidebar text-center">
        @yield('sidebar')
    </div>
    <!-- Contenido principal -->
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <span class="navbar-text">
                Hospital X
                <img style="width: 50px; height: 50px;" src="https://cdn-icons-png.flaticon.com/512/4320/4320350.png" alt="Imagen de perfil" class="img-fluid rounded-circle">
            </span>
            </div>
        </div>
        </nav>
        @yield('contenido')
    </div>
</body>
</html>
