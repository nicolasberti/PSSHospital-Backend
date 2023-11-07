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
     <form action="{{ route('admin.select_horario_atencion_agregar_cita', '1') }}" method="GET">
        <select name="medico_id">
            @foreach($medicos as $medico)
                <option value="{{ $medico->id }}">{{ $medico->name }}</option>
            @endforeach
        </select>
        <button type="submit">Seleccionar</button>
    </form>

@endsection
