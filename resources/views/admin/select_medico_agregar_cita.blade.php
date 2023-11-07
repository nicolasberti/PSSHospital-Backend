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
<form method="GET" action="{{ route('admin.select_fecha_atencion_agregar_cita', ['id' => $medicos[0]->id]) }}" id="selectMedicoForm">
    <select name="medico_id" id="medico_id">
        @foreach($medicos as $medico)
            <option value="{{ $medico->id }}">{{ $medico->name }} {{ $medico->lastName }}</option>
        @endforeach
    </select>
    <button type="submit">Seleccionar</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#medico_id').change(function() {
            var selectedMedicoId = $(this).val();
            var currentUrl = "{{ route('admin.select_fecha_atencion_agregar_cita', ['id' => ':id']) }}";
            var newUrl = currentUrl.replace(':id', selectedMedicoId);
            $('#selectMedicoForm').attr('action', newUrl);
        });
    });
</script>

@endsection
