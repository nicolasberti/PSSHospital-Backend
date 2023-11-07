@extends('template')

@section('sidebar')
        <div class="card-body">  
            <img style="width: 100px; height: 100px;" src="https://cdn-icons-png.flaticon.com/512/560/560199.png" alt="Imagen de perfil" class="img-fluid rounded-circle">
            <p>Nombre médico</p>
        </div>
        <div>
            <a href="/" >Mis Datos</a>
        </div>
        <div class="logout-button">
            <a href="#" class="btn btn-danger">Salir</a>
        </div>
@endsection

@section('contenido')
<div class="card shadow">
<form method="POST" action="{{  route('medico.consultar_ficha_medica_paciente')  }}">
        @csrf
    <div class="row container px-4 py-3">
        <div>
            <h3 class="me-3">Paciente</h3>
            <input type="text" name="dni" id="dni" class="form-control"
                placeholder="Ingrese DNI del paciente" pattern="\d*" title="Ingrese solo números" maxlength="8" minlength="8" required>
        </div>
        <br/>
        <input type="submit" value="Continuar" class="btn btn-primary my-2">
    </div>
</form>
</div>

@if(session('alert') == 'success')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        alert("{{ session('success') }}");
    });
</script>
@endif

@endsection