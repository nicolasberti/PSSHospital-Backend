@extends('template')

@section('sidebar')
        <div class="card-body">  
            <img style="width: 100px; height: 100px;" src="https://cdn-icons-png.flaticon.com/512/1430/1430453.png" alt="Imagen de perfil" class="img-fluid rounded-circle">
            <p>{{$paciente->name}}</p>
        </div>
        <div class="card-body">  
          <a href="/paciente/mis-datos/{{$username}}">Mis datos</a>
        </div>
        <div class="card-body">  
            <a href="/paciente/mis_fichas/{{$paciente->id}}">Mis fichas médicas</a>
        </div>
        <div class="card-body">  
            <a href="/paciente/mis_citas/{{$paciente->id}}">Mis citas</p>
        </div>
        <div class="card-body">  
            <a href="/paciente/create_cita/{{$paciente->id}}">Solicitar cita</a>
        </div>
        <div class="logout-button">
            <a href="/login" class="btn btn-danger">Salir</a>
        </div>
@endsection