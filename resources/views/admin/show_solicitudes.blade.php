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
    <h1>Solicitudes de cambio de datos</h1>
    <div class="card shadow">
        

        <table class="table">
            <thead>
            <tr>
                <th scope="col">DNI paciente</th>
                <th scope="col">Nombre paciente</th>
                <th scope="col">Apellido paciente</th>
                <th scope="col">DNI secretario</th>
                <th scope="col">Nombre secretario</th>
                <th scope="col">Apellido secretario</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($secretario_paciente as $solicitud)
                <tr>
                    <th scope="row">{{ $solicitud->paciente->DNI }}</th>
                    <th scope="row">{{ $solicitud->paciente->name }}</th>
                    <th scope="row">{{ $solicitud->paciente->lastname }}</th>
                    <th scope="row">{{ $solicitud->secretario->DNI }}</th>
                    <th scope="row">{{ $solicitud->secretario->name }}</th>
                    <th scope="row">{{ $solicitud->secretario->lastname }}</th>
                    <th scope="row">
                        <a href="{{ route('admin.edit_datos_criticos_paciente', ['solicitud' => $solicitud->id]) }}" class="btn btn-success mr-2">Ver</a>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>

        <br/>
        <div class="col text-center">
            <div class="col"><form method="GET" action="{{route('admin.index')}}">
                    <button type="submit" class="btn btn-primary">Volver</button>
                    </form>
            </div>
        </div>
        <br/>
        
    </div>
@endsection