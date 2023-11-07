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
<div class="container">
    <div class="row">
        @foreach($citas as $cita)
            <div class="col-12">
            <?php $medico = \App\Models\Medico::find($cita->id_medico); ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Medico: {{ $medico->name }}{{ $medico->lastName }}</h5>
                        <p class="card-text">Fecha: {{ $cita->fecha }}</p>
                        <p class="card-text">Hora: {{ $cita->horarioInicio }}</p>
                        <p class="card-text">Estado: {{ $cita->state }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
