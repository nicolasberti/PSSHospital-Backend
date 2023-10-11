@extends('paciente.index')

@section('contenido')

<div class="text-center justify-content-center">
<h1>Mis datos personales</h1>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="card w-25 m-2"> <!-- Agregamos la clase "m-2" para el margen y "w-25" para el ancho -->
      <div class="card-body text-center">
        <h5 class="card-title">DNI</h5>
        <p class="card-text">{{$paciente->DNI}}</p>
      </div>
    </div>
    <div class="card w-25 m-2"> <!-- Agregamos la clase "m-2" para el margen y "w-25" para el ancho -->
      <div class="card-body text-center">
        <h5 class="card-title">Email</h5>
        <p class="card-text">{{$paciente->email}}</p>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="card w-25 m-2"> <!-- Agregamos la clase "m-2" para el margen y "w-25" para el ancho -->
      <div class="card-body text-center">
        <h5 class="card-title">Nombre</h5>
        <p class="card-text">{{$paciente->name}}</p>
      </div>
    </div>
    <div class="card w-25 m-2"> <!-- Agregamos la clase "m-2" para el margen y "w-25" para el ancho -->
      <div class="card-body text-center">
        <h5 class="card-title">Apellido</h5>
        <p class="card-text">{{$paciente->lastname}}</p>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="card w-25 m-2"> <!-- Agregamos la clase "m-2" para el margen y "w-25" para el ancho -->
      <div class="card-body text-center">
        <h5 class="card-title">Telefono</h5>
        <p class="card-text">{{$paciente->phone}}</p>
      </div>
    </div>
    <div class="card w-25 m-2"> <!-- Agregamos la clase "m-2" para el margen y "w-25" para el ancho -->
      <div class="card-body text-center">
        <h5 class="card-title">Fecha de nacimiento</h5>
        <p class="card-text">{{$paciente->DOB}}</p>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="card w-50 m-2"> <!-- Agregamos la clase "m-2" para el margen y "w-25" para el ancho -->
      <div class="card-body text-center">
        <h5 class="card-title">Dirección</h5>
        <p class="card-text">hardcodeada de momento</p>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="card w-25 m-2"> <!-- Agregamos la clase "m-2" para el margen y "w-25" para el ancho -->
      <div class="card-body text-center">
        <h5 class="card-title">Ciudad</h5>
        <p class="card-text">{{$paciente->city}}</p>
      </div>
    </div>
    <div class="card w-25 m-2"> <!-- Agregamos la clase "m-2" para el margen y "w-25" para el ancho -->
      <div class="card-body text-center">
        <h5 class="card-title">Provincia</h5>
        <p class="card-text">{{$paciente->state}}</p>
      </div>
    </div>
  </div>
</div>



@endsection