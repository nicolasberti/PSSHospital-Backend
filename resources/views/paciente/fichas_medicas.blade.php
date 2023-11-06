@extends('paciente.index')

@section('contenido')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Mi ficha médica</h2>
            
            @foreach($citas as $cita)
            @if($cita->state === 'Realizada')
            <div class="card shadow">
                
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center;">Fecha: {{ date('d/m/Y', strtotime($cita->fecha)) }} {{ $cita->medico->especialidad}} {{ $cita->medico->name }} {{$cita->medico->lastName}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{ $cita->diagnostico }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                

                </div>
            </div>
            <br/>
            @endif
            @endforeach
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
   
</script>
@endsection