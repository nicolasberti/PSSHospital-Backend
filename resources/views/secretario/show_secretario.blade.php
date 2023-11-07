@extends('template')

@section('sidebar')
    <div class="card-body">
        <img style="width: 100px; height: 100px;" src="https://cdn-icons-png.flaticon.com/512/1430/1430453.png" alt="Imagen de perfil" class="img-fluid rounded-circle">
        <p>Nombre del Secretario</p>
    </div>
    <div class="logout-button">
        <a href="#" class="btn btn-danger">Salir</a>
    </div>
@endsection

@section('contenido')
<h1>Datos Personales</h1>
<div class="card shadow">
    <div class="row container px-4 py-3">
        <div class="col-md-6 mb-3">
            <label for="DNI" class="form-label">DNI</label>
            <div class="form-control" name="DNI">12345678</div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="Email" class="form-label">Email</label>
            <div class="form-control" name="Email">secretario@gmail.com</div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="Name" class="form-label">Nombre</label>
            <div class="form-control" name="Name">Nombre del Secretario</div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="LastName" class="form-label">Apellido</label>
            <div class="form-control" name="LastName">Apellido del Secretario}</div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="Phone" class="form-label">Telefono</label>
            <div class="form-control" name="Phone">12345678</div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="DateOfBirth" class="form-label">Fecha de nacimiento</label>
            <div class="form-control" name="DateOfBirth">18/12/2000</div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="Address" class="form-label">Dirección</label>
            <div class="form-control" name="Address">Calle 123</div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="City" class="form-label">Ciudad</label>
            <div class="form-control" name="City">Ciudad de Ejemplo</div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="State" class="form-label">Provincia</label>
            <div class="form-control" name="State">Provincia de Ejemplo</div>
        </div>
    </div>
    <a href="/secretario" class="btn btn-primary">Volver</a>
</div>
@endsection
