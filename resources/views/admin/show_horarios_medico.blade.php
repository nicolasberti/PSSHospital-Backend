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
    <div class="card shadow">
        <h3>Nombre</h3>
        <h3>DNI</h3>
        <h3>Dias</h3>
        <h3>Horario</h3>
        <h3>Duracion</h3>
        <div>
            <div class="col">
                <form method="GET" action="{{route('admin.index')}}">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
        </div>
        <div class="col">
            <div class="col">
                <form method="GET" action="{{route('admin.index')}}">
                    <button type="submit" class="btn btn-primary">Volver</button>
                </form>
            </div>
        </div>
    </div>
@endsection
