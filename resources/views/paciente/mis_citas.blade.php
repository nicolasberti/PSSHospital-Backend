@extends('paciente.index')

@section('contenido')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Citas de {{$paciente->name}} {{$paciente->lastname}}</h2>
            
            @foreach($citas as $cita)
            <div class="card shadow">
                
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center;">Médico</th>
                                <th scope="col" style="text-align: center;">Fecha</th>
                                <th scope="col" style="text-align: center;">Hora</th>
                                <th scope="col" style="text-align: center;">Estado</th>
                                <th scope="col" style="text-align: center;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" style="text-align: center;">{{ $cita->medico->name }} {{$cita->medico->lastName}}</th>
                                <th scope="row" style="text-align: center;">{{ date('d/m/Y', strtotime($cita->fecha)) }}</th>
                                <th scope="row" style="text-align: center;">{{ $cita->horarioInicio }}</th>
                                <th scope="row" style="text-align: center;">{{ $cita->state }}</th>
                                <th scope="row" style="text-align: center;">
                                @if(strtotime($cita->fecha) >= strtotime(now()->toDateString()) && ($cita->state === 'Pendiente' || $cita->state === 'Disponible'))
                                    <form method="POST" action="{{ route('cita.cancelar', ['id_cita' => $cita->id, 'id_paciente' => $paciente->id]) }}">
                                        @csrf
                                        
                                        <button type="submit" class="btn btn-danger">Cancelar</button>
                                    </form>
                                @endif
                                </th>
                                
                            </tr>
                        </tbody>
                    </table>
                

                </div>
            </div>
            <br/>
            @endforeach
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
   
</script>
@endsection