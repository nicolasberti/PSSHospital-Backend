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
<form id="searchForm" method="GET" action="{{ route('admin.show_paciente_citas', ['dni' => '__DNI__']) }}">
    @csrf
    <input type="text" id="dni" name="dni" placeholder="Ingrese el DNI">
    <button type="button" onclick="submitForm()">Buscar</button>
</form>

<script>
    function submitForm() {
        var dni = document.getElementById('dni').value;
        var formAction = document.getElementById('searchForm').action;
        formAction = formAction.replace('__DNI__', dni);
        document.getElementById('searchForm').action = formAction;
        document.getElementById('searchForm').submit();
    }
</script>
@endsection
