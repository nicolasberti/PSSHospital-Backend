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
    <h1>Secretarios</h1>
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
                @foreach($secretarios as $secretario)
                <tr>
                    <th scope="row">>{{$secretario->DNI}}</th>
                    <th scope="row">{{$secretario->name}}</th>
                    <th scope="row">{{$secretario->lastname}}</th>
                    <th scope="row">
                        <a href="{{ route('admin.edit_secretario', ['secretario' => $secretario->id]) }}" class="btn btn-success mr-2">Editar</a>
                    </th>
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
@if(session('alert') == 'success')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                alert("{{ session('success') }}");
            });
        </script>
@endif
@endsection