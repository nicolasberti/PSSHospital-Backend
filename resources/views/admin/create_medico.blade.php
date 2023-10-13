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
    <form action="/admin" method="POST" class="container px-4 py-3">
        @csrf
        <div id="emailHelp" class="form-text">Los campos con (*) son obligatorios.</div>
        <div class="row row-cols-2">
            <div class="col mb-3">
                <label for="DNI" class="form-label">DNI (*)</label>
                <input type="number" class="form-control" id="DNIInput" name="DNI" required min="1">
            </div>
            <div class="col mb-3">
                <label for="Name" class="form-label">Nombre (*)</label>
                <input type="text" class="form-control" id="NameInput" name="Name" requied>
            </div>
            <div class="col mb-3">
                <label for="Username" class="form-label">Username (*)</label>
                <input type="text" class="form-control" id="UsernameInput" name="Username" required>
            </div>
            <div class="col mb-3">
                <label for="Password" class="form-label">Contraseña (*)</label>
                <input type="password" class="form-control" id="PasswordInput" name="Password" required>
            </div>
            <div class="col mb-3">
                <label for="Email" class="form-label">Email (*)</label>
                <input type="text" class="form-control" id="EmailInput" name="Email" required>
            </div>
            <div class="col mb-3">
                <label for="Phone" class="form-label">Telefono (*)</label>
                <input type="number" class="form-control" id="PhoneInput" name="Phone" required min="1">
            </div>
            <div class="col mb-3">
                <label for="State" class="form-label">Estado (*)</label>
                <input type="text" class="form-control" id="StateInput" name="State" required>
            </div>
            <div class="col mb-3">
                <label for="Specialty" class="form-label">Especialidad (*)</label>
                <input type="text" class="form-control" id="SpecialtyInput" name="Specialty" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="/admin/" id="cancel" name="cancel" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>
@endsection
