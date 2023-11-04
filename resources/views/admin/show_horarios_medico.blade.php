@extends('template')

@section('sidebar')
    <div class="card-body">
        <img style="width: 100px; height: 100px;" src="https://cdn-icons-png.flaticon.com/512/560/560199.png" alt="Imagen de perfil" class="img-fluid rounded-circle">
        <p>Nombre administrador</p>
    </div>
    <div class="logout-button">
        <a href="#" class="btn btn-danger">Salir</a>
    </div>
@endsection

@section('contenido')
    <h1>Horario Medico</h1>
    <div class="card shadow p-3">
        <div class="mb-3">
            <h3 class="d-inline-block mr-3">Nombre:</h3>
            <h3 class="d-inline-block">DNI:</h3>
        </div>
        <h3 class="mb-3">Dias</h3>
        <h3 class="mb-3">Horario</h3>
        <h3 class="mb-3">Duracion</h3>
        <div class="mb-3">
            <div class="col text-center">
                <form method="GET" action="{{ route('admin.edit_horario_medico') }}" class="d-inline-block">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
                <form method="GET" action="{{ route('admin.index') }}" class="d-inline-block ml-2">
                    <button type="submit" class="btn btn-primary">Volver</button>
                </form>
            </div>
        </div>
    </div>
@endsection
