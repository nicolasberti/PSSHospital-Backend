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
    <h1>Médicos</h1>
    <input type="text" id="SearchName" name="SearchName" required>
    <a href="" class="btn btn-info">Buscar</a>
    <div class="card shadow">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">DNI</th>
                <th scope="col">Apellido(s) y Nombre(s)</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medicos as $medico)
                    <tr>
                        <td>{{ $medico->DNI }}</td>
                        <td>{{$medico->lastName}}, {{ $medico->name }}</td>
                        <td><a href="{{ url('/admin/medicos/horarios/'.$medico->id.'/show') }}" class="btn btn-info">Consultar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br/>
        <div class="col text-center">
            <div class="col"><form method="GET" action="{{route('admin.index')}}">
                <button type="submit" class="btn btn-primary">Volver</button>
            </form>
            </div>
        </div>
        <br/>

    </div>
@endsection
