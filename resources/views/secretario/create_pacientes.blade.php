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

@section ('contenido')
<h1>Registar Paciente</h1>
<div class="card shadow">  
    <div class="px-4 py-3">  
        <form method="POST" action="{{ route('paciente.store') }}" id="registroPacienteForm">
            @csrf
            DNI(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" name="DNI">
                <label for="floatingInput">DNI</label>
            </div>
            Nombre de usuario(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" name="username">
                <label for="floatingInput">Username</label>
            </div>
            Contraseña(*)
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="password" >
                <label for="floatingPassword">Password</label>
            </div>
            Fecha de Nacimiento(*)
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingInput" name="DOB">
                <label for="floatingInput">Fecha de Nacimiento</label>
            </div>
            Nombre(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" name="name">
                <label for="floatingInput">Nombre</label>
            </div>
            Apellido(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" name="lastname">
                <label for="floatingInput">Apellido</label>
            </div>
            Teléfono(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" name="phone">
                <label for="floatingInput">Teléfono</label>
            </div>  
            Email(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" name="email">
                <label for="floatingInput">Email</label>
            </div>
            Dirección(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" name="address">
                <label for="floatingInput">Dirección</label>
            </div>
            Ciudad(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" name="city">
                <label for="floatingInput">Ciudad</label>
            </div>
            Provincia(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" name="provincia">
                <label for="floatingInput">Provincia</label>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </form>
        <div class="d-flex justify-content-between">
            <form method="GET" action="{{ route('secretario.index') }}" class="mb-auto">
                <button type="submit" class="btn btn-primary">Volver</button>
            </form>
        </div>
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

