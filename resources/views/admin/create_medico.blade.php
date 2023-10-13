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
<h1>Registrar Médico</h1>
<div class="card shadow">
    <form class="container px-4 py-3">
        <div class="row row-cols-2">
            <div class="col mb-3">
                <label for="DNIInput" class="form-label">DNI (*)</label>
                <input type="number" class="form-control" id="DNIInput">
            </div>
            <div class="col mb-3">
                <label for="NameInput" class="form-label">Nombre (*)</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="col mb-3">
                <label for="exampleInputPassword1" class="form-label">Username (*)</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="col mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña (*)</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="col mb-3">
                <label for="exampleInputPassword1" class="form-label">Email (*)</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
                        <div class="col mb-3">
                <label for="exampleInputPassword1" class="form-label">Telefono (*)</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="col mb-3">
                <label for="exampleInputPassword1" class="form-label">Estado (*)</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="col mb-3">
                <label for="exampleInputPassword1" class="form-label">Especialidad (*)</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="submit" class="btn btn-danger">Cancelar</button>
        </div>
      </form>
</div>
@endsection
