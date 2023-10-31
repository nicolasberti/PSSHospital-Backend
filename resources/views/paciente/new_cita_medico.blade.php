@extends('paciente.index')

@section('contenido')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title">Días de atención de {{ $medico->name }} {{$medico->lastName}}</h2>
                    <form method="POST" action="{{ route('paciente.newcita_medico', ['id' => $paciente->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $paciente->id }}">
                        <div class="form-floating mb-3">                
                        <input class="form-date" type="date" id="start" name="birthday" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+30 days')) }}">
                        </div>
                        <input type="submit" value="Continuar" class="btn btn-primary my-2">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
   
</script>
@endsection