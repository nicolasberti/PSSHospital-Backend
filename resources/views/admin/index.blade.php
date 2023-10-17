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
        <div class="mt-2">
            <h1>MÉDICOS</h1>
            <div class="container">
            <div class="row">
                <div class="col"><button type="button" class="btn btn-primary">Registrar nuevo médico</button></div>
                <div class="col"><button type="button" class="btn btn-primary">Editar médico</button></div>
                <div class="w-100 mt-2"></div>
                <div class="col"><button type="button" class="btn btn-primary">Cargar horario de médico</button></div>
                <div class="col"><button type="button" class="btn btn-primary">Consultar horarios de médico</button></div>
            </div>
            </div>
        </div>
        <div class="mt-4">
            <h1>SECRETARIOS</h1>
            <div class="container">
            <div class="row">
                <div class="col"><form method="GET" action="{{route('admin.create_secretarios')}}">
                    <button type="submit" class="btn btn-primary">Registrar nuevo secretario</button>
                    </form>
                </div>
                <div class="col"><form method="GET" action="{{route('admin.show_secretarios')}}">
                    <button type="submit" class="btn btn-primary">Editar secretario</button>
                    </form>
                </div>
                <div class="col"><form method="GET" action="{{route('admin.show_baja_secretarios')}}">
                    <button type="submit" class="btn btn-primary">Dar de baja secretario</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
        <div class="mt-4">
            <h1>PACIENTES</h1>
            <div class="container">
            <div class="row">
                <div class="col"><form method="GET" action="{{route('admin.show_solicitudes')}}">
                    <button type="button" class="btn btn-primary">Editar pacientes</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
@endsection