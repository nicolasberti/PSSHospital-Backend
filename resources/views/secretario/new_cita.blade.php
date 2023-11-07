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
<div class="card shadow">
    <form method="POST" action="{{ route('secretario.new_cita_fecha_medico') }}">
        @csrf
        <div class="row container px-4 py-3">
            <h2>Médico</h2>
            <div class="form-floating mb-3">
                <select class="form-select" id="medico_id" name="medico_id">
                    @foreach ($medicos as $medico)
                        <option value="{{ $medico->id }}">{{ $medico->name }} {{ $medico->lastName }}</option>
                    @endforeach
                </select>
            </div>
            <br/>
            <input type="submit" value="Continuar" class="btn btn-primary my-2">
        </div>
    </form>
</div>
@endsection
