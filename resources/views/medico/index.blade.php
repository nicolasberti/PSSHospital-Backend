@extends('template')

@section('sidebar')
        <div class="card-body">  
            <img style="width: 100px; height: 100px;" src="https://cdn-icons-png.flaticon.com/512/560/560199.png" alt="Imagen de perfil" class="img-fluid rounded-circle">
            <p>Nombre médico</p>
        </div>
        <div class="logout-button">
            <a href="#" class="btn btn-danger">Salir</a>
        </div>
@endsection

@section('contenido')

<h1>Fichas médicas</h1>
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="mt-2">
                    <div class="container">
                        <div class="row">
                            <div class="col"><button type="button" class="btn btn-primary">Consultar fichas médicas</button></div>
                            <div class="col"><button type="button" class="btn btn-primary">Agregar visita a ficha médica</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br/>

        <h1>Citas</h1>
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="mt-4">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('medico.index_citas', ['id' => 1]) }}"  class="btn btn-primary">Gestionar mis citas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
@endsection