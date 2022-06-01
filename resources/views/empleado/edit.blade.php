@extends('layouts.app')
@section('content')
<div class="container-fluid mt-5">
    <div class="row mb-4">
        <div class="col border border-light rounded bg-success">
        <h2 class="mb-4 mt-4 text-white text-center">Editando los empleados</h2>
        </div>
    </div>
<form action="{{ url('/empleado/'.$empleado->idEmpleados) }}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
@include('empleado.form')
</form>
</div>
@endsection