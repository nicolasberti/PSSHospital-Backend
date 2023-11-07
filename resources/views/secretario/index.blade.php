@extends('template')

@section('sidebar')
    <div class="card-body">
        <img style="width: 100px; height: 100px;" src="https://cdn-icons-png.flaticon.com/512/1430/1430453.png" alt="Imagen de perfil" class="img-fluid rounded-circle">
        <p>Nombre del Secretario</p>
        <div class="card-body">
            <p>Mis datos</p>
        </div>
    </div>
    <div class="logout-button">
        <a href="#" class="btn btn-danger">Salir</a>
    </div>
@endsection

@section('contenido')
<h1>Pacientes</h1>
<div class="card shadow">
    <div class="card-body row">
    <div class="col"><form method="GET" action="{{route('secretario.create_pacientes')}}">
        <button type="submit" class="btn btn-primary">Registrar Paciente</button>
        </form>
    </div>
    <div class="col"><form method="GET" action="{{route('secretario.show_pacientes')}}">
        <button type="submit" class="btn btn-primary">Editar Paciente</button>
        </form>
    </div>
    <div class="col"><form method="GET" action="{{route('secretario.show_pacientes')}}">
        <button type="submit" class="btn btn-primary">Dar de Baja Paciente</button>
        </form>
    </div>
        <div class="col">
            <button type="button" class="btn btn-primary">Solicitar Edición</button>
        </div>
    </div>
</div>

<br/>

<h1>Citas</h1>
<div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col"><form method="GET" action="{{route('secretario.new_cita')}}">
                    <button type="submit" class="btn btn-primary">Agregar cita</button>
                    </form>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary">Cancelar cita</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary">Consultar cita</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

