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

@section ('contenido')
<h1>Nuevo secretario</h1>
<div class="card shadow">  
    <div class="px-4 py-3">  
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
            Email(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" >
                <label for="floatingInput">Email</label>
            </div>
            Celular(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" >
                <label for="floatingInput">Celular</label>
            </div>  
    </div>
</div>
@endsection