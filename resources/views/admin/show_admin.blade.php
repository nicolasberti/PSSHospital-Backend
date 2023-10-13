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
    <h1>Mis datos personales</h1>
    <div class="card shadow">
        <div class="row container px-4 py-3">
            <div class="col-md-6 mb-3">
                <label for="Username" class="form-label">Username</label>
                <div class="form-control" name="Username">admin_user</div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="DNI" class="form-label">DNI</label>
                <div class="form-control" name="DNI">12345678</div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="Name" class="form-label">Nombre</label>
                <div class="form-control" name="Name">John</div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="LastName" class="form-label">Apellido</label>
                <div class="form-control" name="LastName">Doe</div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="Email" class="form-label">Email</label>
                <div class="form-control" name="Email">john.doe@example.com</div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="Phone" class="form-label">Telefono</label>
                <div class="form-control" name="Phone">1234567890</div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="DateOfBirth" class="form-label">Fecha de nacimiento</label>
                <div class="form-control" name="DatePfBirth">1990-01-01</div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="Address" class="form-label">Dirección</label>
                <div class="form-control" name="Address">123 Main St, Cityville</div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="City" class="form-label">Ciudad</label>
                <div class="form-control" name="City">Cityville</div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="State" class="form-label">Estado</label>
                <div class="form-control" name="State">Active</div>
            </div>
            <a href="/admin" class="btn btn-danger">Volver</a>
        </div>
    </div>
@endsection
