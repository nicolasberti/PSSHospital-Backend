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
<div class="card shadow">
    <form method="POST" action="{{  route('secretario.cancel_cita_paciente')  }}">
        @csrf
        <div class="row container px-4 py-3">
            <div>
                <h3 class="me-3">Paciente</h3>
                <input type="text" name="dni" id="dni" class="form-control"
                    placeholder="Ingrese DNI del paciente" pattern="\d*" title="Ingrese solo números" required>
            </div>
            <br/>
            <input type="submit" value="Continuar" class="btn btn-primary my-2">
        </div>
    </form>
</div>
@endsection
