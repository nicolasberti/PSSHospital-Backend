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
            DNI(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" >
                <label for="floatingInput">DNI</label>
            </div>
            Nombre de usuario(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" >
                <label for="floatingInput">Username</label>
            </div>
            Contraseña(*)
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" >
                <label for="floatingPassword">Password</label>
            </div>
            Nombre(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" >
                <label for="floatingInput">Nombre</label>
            </div>
            Apellido(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" >
                <label for="floatingInput">Apellido</label>
            </div>
            Teléfono(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" >
                <label for="floatingInput">Teléfono</label>
            </div>  
            Email(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" >
                <label for="floatingInput">Email</label>
            </div>
            Dirección(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" >
                <label for="floatingInput">Dirección</label>
            </div>
            Ciudad(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" >
                <label for="floatingInput">Ciudad</label>
            </div>
            Provincia(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" >
                <label for="floatingInput">Provincia</label>
            </div>
    </div>
</div>
@endsection