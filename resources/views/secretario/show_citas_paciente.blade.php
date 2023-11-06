@extends('template')

@section('sidebar')
<div class="card-body">
    <img style="width: 100px; height: 100px;"
        src="https://cdn-icons-png.flaticon.com/512/1430/1430453.png" alt="Imagen de perfil"
        class="img-fluid rounded-circle">
    <p>Nombre del Secretario</p>
</div>
<div class="logout-button">
    <a href="#" class="btn btn-danger">Salir</a>
</div>
@endsection

@section('contenido')

<div class="form-floating mb-3 d-flex align-items-center">
    <h3 class="me-3">Citas de {{$paciente->name}} {{$paciente->lastname}} </h3>
</div>
<br></br>
<div class="horarios-list" style="max-height: 300px; overflow-y: auto;">
    <table class="table">
        <thead>
            <tr>
                <th>Medico</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($citasPendientes as $cita)
            <tr>
                <td>{{$cita->medico->name}} {{$cita->medico->lastName}}</td>
                <td>{{ $cita->fecha }}</td>
                <td>{{ $cita->horarioInicio }} - {{ $cita->horarioFin }}</td>
                <td>{{ $cita->state}}</td>
                <td>
                <a href="{{ route('secretario.confirm_cancel_cita', ['id' => $cita->id]) }}" 
                    onclick="return confirm('¿Seguro que desea cancelar la cita?');" class="btn btn-danger mr-2">Cancelar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection