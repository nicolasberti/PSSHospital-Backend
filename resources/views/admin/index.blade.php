@extends('template')

@section('sidebar')
        <div class="card-body">
            <img style="width: 100px; height: 100px;" src="https://cdn-icons-png.flaticon.com/512/560/560199.png" alt="Imagen de perfil" class="img-fluid rounded-circle">
            <p>Nombre administrador</p>
            <div class="button">
                <a href="/admin/perfil" class="btn btn-info">Mis Datos</a>
            </div>
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
                <div class="col"><a class="btn btn-primary" href="/admin/medicos/create" role="button">Registrar nuevo médico</a></div>
                <div class="col"><a type="button" href="/admin/medicos" class="btn btn-primary">Editar médico</a></div>
                <div class="col"><a type="button" href="/admin/medicos/horarios" class="btn btn-primary">Horarios de médico</a></div>
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
                <div class="col">
                    <a href="{{ route('admin.show_solicitudes') }}" class="btn btn-primary">Editar pacientes</a>
                </div>
            </div>
            </div>
        </div>

        <div class="mt-4">
            <h1>Citas</h1>
            <div class="container">
            <div class="row">
                <div class="col"><a class="btn btn-primary" href="#" role="button">Agregar cita</a></div>
                <div class="col"><a type="button" href="#" class="btn btn-primary">Cancelar cita</a></div>
                <div class="col"><a type="button" class="btn btn-primary">Consultar cita</a></div>
            </div>
            </div>
        </div>

    @if(session('alert') == 'success')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                alert("{{ session('success') }}");
            });
        </script>
    @endif
@endsection
