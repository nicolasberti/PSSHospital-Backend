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
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title">Días de atención de {{ $medico->name }} {{$medico->lastName}}</h2>
                    <form method="POST" action="{{ route('secretario.new_cita_horarios_medico') }}">
                        @csrf
                        <input type="hidden" name="medico_id" value="{{ $medico->id }}">
                        <div class="form-floating mb-3">                
                            <input class="form-date" type="date" id="fecha" name="fecha" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+30 days')) }}">
                        </div>
                        <input type="submit" value="Continuar" class="btn btn-primary my-2">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
