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
    <form action="" method="POST">
        @csrf
        <label for="medico">Seleccionar médico:</label>
        <select name="medico" id="medico">
            @foreach($medicos as $medico)
                <option value="{{ $medico->name }}">{{ $medico->name }}</option>
            @endforeach
        </select>
        <br><br>
        <input type="submit" value="Enviar" disabled>
    </form>
@endsection
