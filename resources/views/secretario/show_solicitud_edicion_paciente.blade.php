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
<h3 class="me-3">Cambios a realizar y justificacion</h3>
<div class="card shadow">
    <form method="POST" action="{{  route('secretario.create_solicitud_edicion')  }}">
        @csrf
        <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
        <div class="row container px-4 py-3">
            <div>
                <input type="text" name="justificacion" id="justificacion" class="form-control"
                    placeholder="Ingrese los cambios y la justificacion" required>
            </div>
            <br/>
            <input type="submit" value="Enviar Solicitud" class="btn btn-primary my-2">
        </div>
    </form>
</div>

@endsection