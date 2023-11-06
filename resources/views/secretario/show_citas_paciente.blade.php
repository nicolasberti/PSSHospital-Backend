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
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($horariosDisponibles as $horario)
            <tr>
                <td>{{ $horario->horario_inicio }} - {{ $horario->horario_fin }}</td>
                <td>
                    @php
                    $ocupado = false;
                    foreach ($citasEnHorario as $cita) {
                        if (Carbon\Carbon::parse($cita->horarioInicio)->format('H:i') == Carbon\Carbon::parse($horario->horario_inicio)->format('H:i')) {
                            $ocupado = true;
                            break;
                        }
                    }
                    @endphp

                    @if ($ocupado)
                    Ocupado
                    @else
                    Disponible
                    @endif
                </td>
                <td>
                    @if (!$ocupado)
                    <input type="hidden" name="fecha" value="{{ $fechaSeleccionada }}">
                    <input type="hidden" name="horarioInicio" value="{{ $horario->horario_inicio }}">
                    <input type="hidden" name="horarioFin" value="{{ $horario->horario_fin }}">
                    <input type="hidden" name="duracion" value="{{ $horario->duracion }}">
                    <input type="hidden" name="medico_id" value="{{ $medico->id }}">
                    <button type="submit" name="horario_id" value="{{ $horario->id }}"
                        class="btn btn-success">Solicitar Cita</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection