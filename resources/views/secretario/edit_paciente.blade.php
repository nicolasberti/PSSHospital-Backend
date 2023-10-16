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
<h1>Editar Paciente</h1>
<div class="card shadow">
    <form action="/secretario/pacientes/{{$paciente->id}}" method="POST" class="container px-4 py-3">
        @csrf
        @method('PUT')
        <div class="row row-cols-2">
            <div class="col mb-3">
                <label for="DNI" class="form-label">DNI</label>
                <input type="number" class="form-control" id="DNIInput" name="DNI" value="{{$paciente->DNI}}" required min="1" readonly>
            </div>
            <div class="col mb-3">
                <label for="DOB" class="form-label">Fecha de Nacimiento</label>
                <input type="text" class="form-control" id="DOBInput" name="DOB" value="{{$paciente->DOB}}" required readonly>
            </div>
            <div class="col mb-3">
                <label for="Name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="NameInput" name="name" value="{{$paciente->name}}" required readonly>
            </div>
            <div class="col mb-3">
                <label for="LastName" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="LastNameInput" name="lastname" value="{{$paciente->lastname}}" required readonly>
            </div>
            <div class="col mb-3">
                <label for="Phone" class="form-label">Telefono</label>
                <input type="number" class="form-control" id="PhoneInput" name="phone" value="{{$paciente->phone}}" required min="1">
            </div>
            <div class="col mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="text" class="form-control" id="EmailInput" name="email" value="{{$paciente->email}}" required>
            </div>
            <div class="col mb-3">
                <label for="Address" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="AddressInput" name="address" value="{{$paciente->address}}" required>
            </div>
            <div class="col mb-3">
                <label for="City" class="form-label">Ciudad</label>
                <input type="text" class="form-control" id="CityInput" name="city" value="{{$paciente->city}}" required>
            </div>
            <div class="col mb-3">
                <label for="Provincia" class="form-label">Provincia</label>
                <input type="text" class="form-control" id="ProvinceInput" name="provincia" value="{{$paciente->provincia}}" required>
            </div>
        </div>
        <a href="/secretario/pacientes/" id="cancel" name="cancel" class="btn btn-primary">Volver</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection

