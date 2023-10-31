@extends('paciente.index')

@section('contenido')
<div class="card shadow">
        <div class="row container px-4 py-3">
            <h2>Médico</h2>
            <div class="form-floating mb-3">
                <input type="hidden" name="id" value="{{ $paciente->id }}">
                <select class="form-select" id="medico_id" name="medico_id" onchange="updateMedicoId()">
                    @foreach ($medicos as $medico)
                        <option value="{{ $medico->id }}">{{ $medico->name }}</option>
                    @endforeach
                </select>
                <br/>
                <a href="{{ route('paciente.newcita_medico', ['id' => $paciente->id, 'medico_id' => 1]) }}" type="submit" class="btn btn-primary float-start" value="Continuar">Continuar</a>
            </div>
        </div>
</div>
@endsection

@section('scripts')
<script>
        function updateMedicoId() {
        var select = document.getElementById('medico_id');
        var medicoId = select.value; // Obtiene el valor seleccionado en el select
        var continuarBtn = document.getElementById('continuarBtn');
        
        // Actualiza el atributo href del botón "Continuar" con el nuevo medico_id
        continuarBtn.href = "{{ route('paciente.newcita_medico', ['id' => $paciente->id, 'medico_id' => '"+medicoId+"']) }}";    
        }
</script>
@endsection
