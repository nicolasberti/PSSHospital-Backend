@extends('template')

@section('sidebar')
    <div class="card-body">
        <img style="width: 100px; height: 100px;" src="https://cdn-icons-png.flaticon.com/512/1430/1430453.png" alt="Imagen de perfil" class="img-fluid rounded-circle">
        <p>Nombre del Secretario</p>
    </div>
    <div class="logout-button">
        <a href="#" class="btn btn-danger">Salir</a>
    </div>
@endsection

@section('contenido')
    <div class="container">
    <div class="d-flex justify-content-between">
        <h3>Medico: {{ $medico->name }} {{ $medico->lastName }}</h3>
        <h3>Día: {{ $fechaSeleccionada }}</h3>
    </div>
        @csrf
        <br></br>
        <div class="form-floating mb-3 d-flex align-items-center">
            <h3 class="me-3">Paciente</h3>
            <input type="text" name="dni" id="dni" class="form-control" placeholder="Ingrese DNI del paciente">
        </div>
    <div class="horarios-list" style="max-height: 300px; overflow-y: auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>Horario</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($horariosDisponibles as $horario)
                    <tr>
                        <td>{{ $horario['horario'] }}</td>
                        <td>Disponible</td>
                        <td>
                            <button class="btn btn-success">Solicitar Cita</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection