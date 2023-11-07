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
                                    {{$instanciaDia->dia}}
                                        <tr>
                                            <td scope="row" style="text-align: center;"> 09:00 - 09:30 </td> 
                                            <td scope="row" style="text-align: center;">Disponible </td> 
                                            <td scope="row" style="text-align: center;"><button type="button" class="btn btn-success">Solicitar</button></td>
                                        <tr>
                                            <td scope="row" style="text-align: center;"> 09:00 - 09:30 </td> 
                                            <td scope="row" style="text-align: center;">Disponible </td> 
                                            <td scope="row" style="text-align: center;"><button type="button" class="btn btn-success">Solicitar</button></td>
                                        </tr>
                                        <tr>
                                            <td scope="row" style="text-align: center;"> 09:00 - 09:30 </td> 
                                            <td scope="row" style="text-align: center;">Disponible </td> 
                                            <td scope="row" style="text-align: center;"><button type="button" class="btn btn-success">Solicitar</button></td>
                                        </tr>
                                        <tr>
                                            <td scope="row" style="text-align: center;"> 09:00 - 09:30 </td> 
                                            <td scope="row" style="text-align: center;">Disponible </td> 
                                            <td scope="row" style="text-align: center;"><button type="button" class="btn btn-success">Solicitar</button></td>
                                        </tr>
                                        <tr>
                                            <td scope="row" style="text-align: center;"> 09:00 - 09:30 </td> 
                                            <td scope="row" style="text-align: center;">Disponible </td> 
                                            <td scope="row" style="text-align: center;"><button type="button" class="btn btn-success">Solicitar</button></td>
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