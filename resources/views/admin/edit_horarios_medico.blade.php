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
    <h1>Horario Medico</h1>
    <div class="card shadow p-3">
        <div class="mb-3">
            <h3 class="d-inline-block mr-3">Nombre: {{$medico->name}} {{$medico->lastName}}</h3>
            <h3 class="d-inline-block">DNI:{{$medico->DNI}}</h3>
        </div>
    <form method="POST" action="/admin/medicos/horarios/{{$medico->id}}/" id="horarioMedicoForm">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h3>Dias</h3>
            <div class="btn-group d-flex justify-content-center" role="group" aria-label="Días de la semana">
                @foreach($dias_semana as $dia_semana)
                <div class="form-check">
                    <input type="checkbox" id="{{$dia_semana['id']}}" class="form-check-input" @if($dias->contains('dia', $dia_semana['dia'])) checked @endif name="dias[]" value="{{$dia_semana['dia']}}">
                    <label for="{{$dia_semana['id']}}" class="form-check-label">
                        {{$dia_semana['dia']}}
                    </label>
                </div>
            @endforeach
            </div>
        </div>
        <div class="mb-3">
            <h3>Horario</h3>
            <div class="input-group">
                <input type="time" class="form-control" name="horario_inicio" value={{$horarios->horario_inicio}} required>
                <span class="input-group-text">hs</span>
                <input type="time" class="form-control" name="horario_fin" value={{$horarios->horario_fin}} required>
                <span class="input-group-text">hs</span>
            </div>
        </div>
        <div class="mb-3">
            <h3>Duracion</h3>
            <div class="input-group">
                <input type="number" class="form-control" placeholder="Duración en minutos" min="1" name="duracion" value={{$horarios->duracion}} required>
                <span class="input-group-text">minutos</span>
            </div>
        </div>
        <div class="mb-3">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
                {{-- <form method="GET" action="{{ route('admin.index') }}" class="d-inline-block ml-2">
                    <button type="submit" class="btn btn-primary">Volver</button>
                </form> --}}
            </div>
        </div>
    </div>

    <script>
        // Assuming you have a form with id "horarioMedicoForm" and checkboxes with class "form-check-input"

        // Add an event listener to the form submit event
        document.getElementById("horarioMedicoForm").addEventListener("submit", function(event) {
        // Get all the checkboxes with class "form-check-input"
        var checkboxes = document.querySelectorAll(".form-check-input");

        // Check if at least one checkbox is checked
        var isChecked = Array.prototype.slice.call(checkboxes).some(function(checkbox) {
            return checkbox.checked;
        });

        // If no checkbox is checked, prevent the form submission
        if (!isChecked) {
            event.preventDefault();
            alert("Seleccione al menos un día de la semana");
        }
        });

        document.getElementById("horarioMedicoForm").addEventListener("submit", function(event) {
            var horarioInicio = document.getElementsByName("horario_inicio")[0].value;
            var horarioFin = document.getElementsByName("horario_fin")[0].value;

            if (horarioInicio >= horarioFin) {
                event.preventDefault();
                alert("El horario de inicio debe ser anterior al horario de fin");
            }
        });
    </script>
@endsection
