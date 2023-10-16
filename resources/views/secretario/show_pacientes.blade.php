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

@section('contenido')
    <h1>Pacientes</h1>
    <div class="card shadow">

        <div class="d-flex justify-content-end">

            <div class="form-group">
            <br/>
                <div class="input-group">
                    <input type="text" class="form-control" id="DNI" name="DNI" placeholder="DNI">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </div>

        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">DNI</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $paciente)
                    <tr>
                        <td>{{ $paciente->DNI }}</td>
                        <td>{{$paciente->lastName}}, {{ $paciente->name }}</td>
                        <td><a href="{{ url('/secretario/pacientes/'.$paciente->id.'/edit') }}" class="btn btn-info">Editar</a></td>
                        <td><button type="button" class="btn btn-primary">Dar de baja</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br/>
        <div class="col text-center">
            <div class="col"><form method="GET" action="{{route('secretario.index')}}">
                    <button type="submit" class="btn btn-primary">Volver</button>
                    </form>
            </div>
        </div>
        <br/>

    </div>
@endsection
@if(session('alert') == 'success')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                alert("{{ session('success') }}");
            });
        </script>
@endif