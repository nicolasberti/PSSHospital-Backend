@extends('template')

@section('sidebar')
        <div class="card-body">  
            <img style="width: 100px; height: 100px;" src="https://cdn-icons-png.flaticon.com/512/1430/1430453.png" alt="Imagen de perfil" class="img-fluid rounded-circle">
            <p>Nombre Paciente</p>
        </div>
        <div class="card-body">  
            <p>Mis datos</p>
        </div>
        <div class="card-body">  
            <p>Mis ficha médica</p>
        </div>
        <div class="card-body">  
            <p>Mis citas</p>
        </div>
        <div class="logout-button">
            <a href="#" class="btn btn-danger">Salir</a>
        </div>
@endsection

