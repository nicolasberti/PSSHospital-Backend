@extends('template')

@section('sidebar')
        <div class="card-body">  
            <img style="width: 100px; height: 100px;" src="https://cdn-icons-png.flaticon.com/512/560/560199.png" alt="Imagen de perfil" class="img-fluid rounded-circle">
            <p>Nombre médico</p>
        </div>
        <div>
            <a href="/" >Mis Datos</a>
        </div>
        <div class="logout-button">
            <a href="#" class="btn btn-danger">Salir</a>
        </div>
@endsection

@section('contenido')
    <div class="container">
        <h2>Fichas Médica de {{ $paciente->name }}</h2>
        <div class="fichas-list" style="max-height: 300px; overflow-y: auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Diagnóstico</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fichas as $cita)
                    <tr>
                        <td>{{ $cita->fecha }}</td>
                        <td>{{ $cita->diagnostico }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection




