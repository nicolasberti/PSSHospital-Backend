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
<div class="container">
    <div class="d-flex justify-content-between">
        <h3>Medico: {{ $medico->name }} {{ $medico->lastName }}</h3>
        <h3>Día: {{ $fechaSeleccionada }}</h3>
    </div>
    <br></br>
    <form method="POST" action="{{ route('secretario.new_cita_create') }}">
        @csrf
        <div class="form-floating mb-3 d-flex align-items-center">
            <h3 class="me-3">Paciente</h3>
            <input type="text" name="dni" id="dni" class="form-control"
                placeholder="Ingrese DNI del paciente" pattern="\d*" title="Ingrese solo números" required>
        </div>
        <div class="horarios-list" style="max-height: 300px; overflow-y: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Horario</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($citas as $cita)
                    <tr>
                        <td>{{ $cita['horario_inicio'] }} - {{ $cita['horario_fin'] }}</td>
                        <td>
                            @php
                                $ocupado = false;
                                foreach ($citasMedicoBD as $citaMedico) {
                                    if ($citaMedico->horarioInicio == $cita['horario_inicio']) {
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
                            <input type="hidden" name="horarioInicio" value="{{ $cita['horario_inicio'] }}">
                            <input type="hidden" name="horarioFin" value="{{ $cita['horario_fin'] }}">
                            <input type="hidden" name="duracion" value="{{ $horario['duracion'] }}">
                            <input type="hidden" name="medico_id" value="{{ $medico['id'] }}">
                            <button type="submit" name="horario_id" value="{{ $horario['id'] }}"
                                class="btn btn-success">Solicitar Cita</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </form>
</div>

@endsection
