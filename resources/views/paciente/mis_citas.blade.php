@extends('paciente.index')

@section('contenido')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <h2>
                    Citas de {{$paciente->name}} {{$paciente->lastname}}</h2>
            <div class="card shadow">
                
                <div class="card-body">
                    
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