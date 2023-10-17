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
    <form method="POST"  action="{{route('create_new_secretario')}}" enctype="multipart/form-data" >
       
        @csrf  
    <div class="px-4 py-3">  
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
            Nombre(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" name="name" >
                <label for="floatingInput">Nombre</label>
            </div>
            Apellido(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" name="lastname" >
                <label for="floatingInput">Apellido</label>
            </div>
            Email(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" name="email">
                <label for="floatingInput">Email</label>
            </div>
            Celular(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" name="phone" >
                <label for="floatingInput">Celular</label>
            </div>  
            Fecha de cumpleaños(*)
            <div class="form-floating mb-3">                
                <input class="form-date" type="date" id="start" name="birthday" min="1900-01-01" max="2023-10-10">
            </div>
            Dirección(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" name="adress">
                <label for="floatingInput">Direccion</label>
            </div>
            Ciudad(*)
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" name="city">
                <label for="floatingInput">Ciudad</label>
            </div>
            Estado(*)
            <div class="form-floating mb-3">
                <select class="form-select" id="estado" name="state">
                    <option value="Habilitado">Habilitado</option>
                    <option value="Inhabilitado">Inhabilitado</option>
                </select>
                <label for="floatingInput">Estado</label>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary float-start" value="Guardar">
                <input type="button" class="btn btn-primary float-end" value="Volver" id="volverBtn">
                <script>
                    document.getElementById('volverBtn').addEventListener('click', function() {
                        // Redirigir a la URL deseada cuando se hace clic en el botón "Volver"
                        window.location.href = '/admin/secretarios/';
                    });
                </script>

            </div>
    </div>
    </form>
    </div>
</div>
@endsection