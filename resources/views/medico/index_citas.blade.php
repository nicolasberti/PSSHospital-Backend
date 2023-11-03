@extends('template')

@section('sidebar')
    <div class="card-body">
        <img style="width: 100px; height: 100px;" src="https://cdn-icons-png.flaticon.com/512/560/560199.png" alt="Imagen de perfil" class="img-fluid rounded-circle">
        <p>Nombre Medico</p>
    </div>
    <div class="logout-button">
        <a href="#" class="btn btn-danger">Salir</a>
    </div>
@endsection

@section('contenido')
    <h1>Mis citas pendientes</h1>
    <div class="card shadow my-3 px-3">
        <div class="col mb-3" style="max-height: 400px; overflow-y: auto;">
            <!-- Aquí empieza el contenido scrollable -->
            @for ($i = 0; $i < 10; $i++)
                <div class="card my-3">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">Paciente</h5>
                            <p class="card-text">Fecha</p>
                            <p class="card-text">Hora</p>
                            <p class="card-text">Fecha</p>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm px-3 py-2">Cancelar</button>
                    </div>
                </div>
            @endfor
            <!-- Puedes agregar más cards según sea necesario -->
            <!-- Aquí termina el contenido scrollable -->
        </div>
        <button type="submit" class="btn btn-primary">Volver</button>
    </div>
@endsection
