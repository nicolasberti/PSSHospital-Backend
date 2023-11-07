@extends('paciente.index')

@section('contenido')
<div class="card shadow">
    <form  method="POST" action="{{route('paciente.newcita_medico', ['id' => $paciente->id])}}" enctype="multipart/form-data">
        @csrf
        <div class="row container px-4 py-3">
            <h2>Médico</h2>
            <div class="form-floating mb-3">
                <input type="hidden" name="id" value="{{ $paciente->id }}">
                <select class="form-select" id="medico_id" name="medico_id">
                    @foreach ($medicos as $medico)
                        <option value="{{ $medico->id }}">{{ $medico->name }} {{ $medico->lastName }}</option>
                    @endforeach
                </select>
                <br/>
                <input type="submit" value="Continuar" class="btn btn-primary my-2" />
            </div>
        </div>
    </form>
</div>
@endsection
