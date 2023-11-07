@extends('template')

@section('sidebar')
    <div class="card-body">
        <img style="width: 100px; height: 100px;" src="https://cdn-icons-png.flaticon.com/512/560/560199.png" alt="Imagen de perfil" class="img-fluid rounded-circle">
        <p>Nombre Medico</p>
    </div>
    <div class="logout-button">
        <a href="#" class="btn btn-danger">Salir</a>
    </div>
@endsection

@section('contenido')
    <h1>Mis citas pendientes</h1>
    <div class="card shadow my-3 px-3">
        <div class="col mb-3" style="max-height: 400px; overflow-y: auto;">
            <!-- Aquí empieza el contenido scrollable -->
            @if ($citas == null)
                <div class="card my-3">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">No tiene citas pendientes</h5>
                        </form>
                    </div>
                </div>
            @else
                @foreach ($citas as $cita)
                    <div class="card my-3">
                        <div class="card-body d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">Paciente: {{ $cita->name }} {{ $cita->lastname}}</h5>
                                <p class="card-text">Fecha: {{ date('d/m/Y', strtotime($cita->fecha)) }}</p>
                                <p class="card-text">Hora: {{ date('H:i', strtotime($cita->horarioInicio)) }}</p>
                            </div>
                            <form id="cancelar-cita-{{ $cita->id }}" action="/medico/{{$cita->id_medico}}/citas/{{$cita->id}}/cancelar" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm px-3 py-2" onclick="confirmCancel({{ $cita->id }})">Cancelar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <a href="/medico" class="btn btn-primary">Volver</a>
    </div>

    <script>
        function confirmCancel(citaId) {
            if (confirm("¿Seguro que desea cancelar la cita?")) {
                document.getElementById('cancelar-cita-' +citaId).submit();
            }
        }
    </script>
@endsection
