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
    <h1>Seleccione un horario de atención para el médico {{ $medico->name }}</h1>
    <ul>
        @foreach($horariosDisponibles as $horario)
            <li>{{ $horario }}</li>
        @endforeach
    </ul>
@endsection
