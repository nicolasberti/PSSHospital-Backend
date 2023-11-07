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
@if(count($citas) > 0)
    <?php $paciente = \App\Models\Paciente::find($citas[0]->id_paciente); ?>
    <h3 class="card-title">Citas de {{ $paciente->name }} {{ $paciente->lastName }}</h3>
    <style>
    .card-body {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
    </style>
    <div class="container">
    <div class="row">
        @foreach($citas as $cita)
            @if($cita->state == 'pendiente')
                <div class="col-12">
                    <?php $medico = \App\Models\Medico::find($cita->id_medico); ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Medico: {{ $medico->name }} {{ $medico->lastname }}</h5>
                            <p class="card-text">Fecha: {{ $cita->fecha }}</p>
                            <p class="card-text">Hora: {{ $cita->horarioInicio }}</p>
                            <p class="card-text">Estado: {{ $cita->state }}</p>
                            <a href="#" onclick="confirmarCancelacion('{{ route('admin.cancelarCita', ['id' => $cita->id]) }}')" class="btn btn-danger">Cancelar cita</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
<script>
    function confirmarCancelacion(url) {
        if (confirm('¿Estás seguro de que deseas cancelar esta cita?')) {
            window.location.href = url;
        }
    }
</script>
</div>
@else
    <h3>No hay citas disponibles.</h3>
@endif
@endsection