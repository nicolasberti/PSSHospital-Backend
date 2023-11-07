@extends('paciente.index')

@section('contenido')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center;">Médico</th>
                                <th scope="col" style="text-align: center;">Día</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" style="text-align: center;">{{ $medico->name }} {{$medico->lastName}}</th>
                                <th scope="row" style="text-align: center;">{{ $dia }}</th>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-control" style="max-height: 200px; overflow: auto;">
                        <table class="table">
                            <tbody>
                                <div class="card shadow">
                                        <tr>
                                            <form method="POST" action="{{ route('paciente.solicitar_cita') }}">
                                            @csrf
                                            
                                                <td scope="row" style="text-align: center;"> 09:00 - 09:29 </td> 
                                                <td scope="row" style="text-align: center;">Disponible </td> 
                                                <input type="hidden" name="fecha" value="{{ $dia }}">
                                                <input type="hidden" name="horarioInicio" value="{{ date('H:i', strtotime('09:00:00')) }}">
                                                <input type="hidden" name="horarioFin" value="{{ date('H:i', strtotime('09:29:00')) }}">
                                                <input type="hidden" name="duracion" value="{{ date('H:i', strtotime('00:29:00')) }}">
                                                <input type="hidden" name="medico_id" value="{{ $medico->id }}">
                                                <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                                                <td scope="row" style="text-align: center;"><button type="submit" class="btn btn-success">Solicitar</button></td>
                                            </form>
                                        <tr>
                                            <form method="POST" action="{{ route('paciente.solicitar_cita') }}">
                                                @csrf
                                            
                                                <td scope="row" style="text-align: center;"> 09:30 - 09:59 </td> 
                                                <td scope="row" style="text-align: center;">Disponible </td> 
                                                <input type="hidden" name="fecha" value="{{ $dia }}">
                                                <input type="hidden" name="horarioInicio" value="{{ date('H:i', strtotime('09:30:00')) }}">
                                                <input type="hidden" name="horarioFin" value="{{ date('H:i', strtotime('09:59:00')) }}">
                                                <input type="hidden" name="duracion" value="{{ date('H:i', strtotime('00:29:00')) }}">
                                                <input type="hidden" name="medico_id" value="{{ $medico->id }}">
                                                <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                                                <td scope="row" style="text-align: center;"><button type="submit" class="btn btn-success">Solicitar</button></td>
                                            </form>
                                        </tr>
                                        <tr>
                                            <form method="POST" action="{{ route('paciente.solicitar_cita') }}">
                                                @csrf
                                            
                                                <td scope="row" style="text-align: center;"> 10:00 - 10:29 </td> 
                                                <td scope="row" style="text-align: center;">Disponible </td> 
                                                <input type="hidden" name="fecha" value="{{ $dia }}">
                                                <input type="hidden" name="horarioInicio" value="{{ date('H:i', strtotime('10:00:00')) }}">
                                                <input type="hidden" name="horarioFin" value="{{ date('H:i', strtotime('10:29:00')) }}">
                                                <input type="hidden" name="duracion" value="{{ date('H:i', strtotime('00:29:00')) }}">
                                                <input type="hidden" name="medico_id" value="{{ $medico->id }}">
                                                <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                                                <td scope="row" style="text-align: center;"><button type="submit" class="btn btn-success">Solicitar</button></td>
                                            </form>
                                        </tr>
                                        <tr>
                                            <form method="POST" action="{{ route('paciente.solicitar_cita') }}">
                                                @csrf
                                            
                                                <td scope="row" style="text-align: center;"> 10:30 - 10:59 </td> 
                                                <td scope="row" style="text-align: center;">Disponible </td> 
                                                <input type="hidden" name="fecha" value="{{ $dia }}">
                                                <input type="hidden" name="horarioInicio" value="{{ date('H:i', strtotime('10:30:00')) }}">
                                                <input type="hidden" name="horarioFin" value="{{ date('H:i', strtotime('10:59:00')) }}">
                                                <input type="hidden" name="duracion" value="{{ date('H:i', strtotime('00:29:00')) }}">
                                                <input type="hidden" name="medico_id" value="{{ $medico->id }}">
                                                <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                                                <td scope="row" style="text-align: center;"><button type="submit" class="btn btn-success">Solicitar</button></td>
                                            </form>
                                        </tr>
                                        <tr>
                                            <form method="POST" action="{{ route('paciente.solicitar_cita') }}">
                                                @csrf
                                            
                                                <td scope="row" style="text-align: center;"> 11:00 - 11:29 </td> 
                                                <td scope="row" style="text-align: center;">Disponible </td> 
                                                <input type="hidden" name="fecha" value="{{ $dia }}">
                                                <input type="hidden" name="horarioInicio" value="{{ date('H:i', strtotime('11:00:00')) }}">
                                                <input type="hidden" name="horarioFin" value="{{ date('H:i', strtotime('11:29:00')) }}">
                                                <input type="hidden" name="duracion" value="{{ date('H:i', strtotime('00:29:00')) }}">
                                                <input type="hidden" name="medico_id" value="{{ $medico->id }}">
                                                <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                                                <td scope="row" style="text-align: center;"><button type="submit" class="btn btn-success">Solicitar</button></td>
                                            </form>
                                        </tr>
                                </div>  
                            </tbody>
                        </table>
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection