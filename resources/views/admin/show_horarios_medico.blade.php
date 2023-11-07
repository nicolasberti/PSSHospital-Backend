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
    <h1>Horario Medico</h1>
    <div class="card shadow p-3">
        <div class="mb-3">
            <h3 class="d-inline-block mr-3">Nombre:{{$medico->name}} {{$medico->lastName}}</h3>
            <h3 class="d-inline-block">DNI:{{$medico->DNI}}</h3>
        </div>
        <h3 class="mb-3">Dias</h3>
        <h4 class="mb-3">
        @foreach ($dias as $dia)
            {{$dia->dia}}
        @endforeach
        </h4>
        <h3 class="mb-3">Horario</h3>
        <h4 class="mb-3">{{$horarios->horario_inicio}} - {{$horarios->horario_fin}}</h4>
        <h3 class="mb-3">Duracion</h3>
        <h4 class="mb-3">{{$horarios->duracion}} minutos</h4>
        <div class="mb-3">
            <div class="col text-center">
                <a href="{{ url('/admin/medicos/horarios/'.$medico->id.'/edit') }}" class="btn btn-info">Editar</a>
                <form method="GET" action="{{ route('admin.index') }}" class="d-inline-block ml-2">
                    <button type="submit" class="btn btn-primary">Volver</button>
                </form>
            </div>
        </div>
    </div>
@endsection
