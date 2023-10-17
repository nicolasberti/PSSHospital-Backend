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
<h1>Cambio datos críticos paciente</h1>
<div class="card shadow">
    <div class="row">
        <div class="col-md-4">
            <!-- Columna izquierda -->
            <div class="paciente-header" style="font-size: 24px;">Paciente</div>
            DNI
            <div class="form-floating mb-3">
                <input class="form-control" name="DNI" value="{{ $solicitud->paciente->DNI }}" required>
            </div>
            Nombre
            <div class="form-floating mb-3">
                <input class="form-control" name="name" value="{{ $solicitud->paciente->name }}" required>
            </div>
            Apellido
            <div class="form-floating mb-3">
                <input class="form-control" name="lastname" value="{{ $solicitud->paciente->lastname }}" required>
            </div>
            Email
            <div class="form-floating mb-3">
                <input class="form-control" name="email" value="{{ $solicitud->paciente->email }}" required>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Columna central -->
            Celular
            <div class="form-floating mb-3">
                <input class="form-control" name="phone" value="{{ $solicitud->paciente->phone }}" required>
            </div>
            Fecha de cumpleaños
            <div class="form-floating mb-3">
                <input class="form-date form-control" type="date" name="birthday" min="1900-01-01" max="2023-10-10" value="{{ $solicitud->paciente->birthday }}" required>
            </div>
            Dirección
            <div class="form-floating mb-3">
                <input class="form-control" name="address" value="{{ $solicitud->paciente->address }}" required>
            </div>
            Ciudad
            <div class="form-floating mb-3">
                <input class="form-control" name="city" value="{{ $solicitud->paciente->city }}" required>
            </div>
            Estado
            <div class="form-floating mb-3">
                <select class="form-select" name="state" required>
                    <option value="Habilitado" {{ $solicitud->state === 'Habilitado' ? 'selected' : '' }}>Habilitado</option>
                    <option value="Inhabilitado" {{ $solicitud->state === 'Inhabilitado' ? 'selected' : '' }}>Inhabilitado</option>
                </select>
                <label for="floatingInput">Estado</label>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Columna derecha -->
            <div class="solicitud-header" style="font-size: 24px;">Solicitud</div>
            <p>{{ $solicitud->descripcion}}</p>
            <div class="secretario-info">
                <p>DNI Secretario: {{ $solicitud->secretario->DNI }}</p>
                <p>Nombre Secretario: {{ $solicitud->secretario->name }}</p>
                <p>Apellido Secretario: {{ $solicitud->secretario->lastname }}</p>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <input type="submit" class="btn btn-primary float-start" value="Guardar">
        <input type="button" class="btn btn-primary float-end" value="Volver" id="volverBtn">
        <script>
            document.getElementById('volverBtn').addEventListener('click', function() {
                // Redirigir a la URL deseada cuando se hace clic en el botón "Volver"
                window.location.href = '/admin/solicitudes/';
            });
        </script>
    </div>
    <br/>
</div>
@endsection

