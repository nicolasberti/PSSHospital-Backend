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
            <h3 class="d-inline-block mr-3">Nombre:</h3>
            <h3 class="d-inline-block">DNI:</h3>
        </div>
        <div class="mb-3">
            <h3>Dias</h3>
            <div class="btn-group d-flex justify-content-center" role="group" aria-label="Días de la semana">
                <button type="button" class="btn btn-outline-primary">Lunes</button>
                <button type="button" class="btn btn-outline-primary">Martes</button>
                <button type="button" class="btn btn-outline-primary">Miércoles</button>
                <button type="button" class="btn btn-outline-primary">Jueves</button>
                <button type="button" class="btn btn-outline-primary">Viernes</button>
                <button type="button" class="btn btn-outline-primary">Sábado</button>
                <button type="button" class="btn btn-outline-primary">Domingo</button>
            </div>
        </div>
        <div class="mb-3">
            <h3>Horario</h3>
            <div class="input-group">
                <input type="time" class="form-control">
                <span class="input-group-text">hs -</span>
                <input type="time" class="form-control">
                <span class="input-group-text">hs</span>
            </div>
        </div>
        <div class="mb-3">
            <h3>Duracion</h3>
            <div class="input-group">
                <input type="number" class="form-control" placeholder="Duración en minutos" min="0">
                <span class="input-group-text">minutos</span>
            </div>
        </div>
        <div class="mb-3">
            <div class="col text-center">
                <form method="GET" action="{{ route('admin.index') }}" class="d-inline-block">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
                <form method="GET" action="{{ route('admin.index') }}" class="d-inline-block ml-2">
                    <button type="submit" class="btn btn-primary">Volver</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Agregar JavaScript para manejar el cambio de estado de los botones
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.btn-group button');

            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    this.classList.toggle('active');
                });
            });
        });
    </script>
@endsection
