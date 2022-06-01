<div class="row">
    <div class="col">
    <label for="NomEmp" >Nombre:</label>
    <input type="text" class="form-control"name="NomEmp" id="NomEmp" value="{{isset($empleado->NomEmp)?$empleado->NomEmp:''}}" required>
    </div>
    <div class="col">
    <label for="ApellEmp" value="Apellido">Apellido:</label>
    <input type="text" class="form-control"name="ApellEmp" id="ApellEmp" value="{{isset($empleado->ApellEmp)?$empleado->ApellEmp:''}}" required>
    </div>
</div>
<div class="row mt-3">
    <div class="col">
    <label for="Telefono" >Telefono:</label>
    <input type="number" class="form-control"name="Telefono" id="Telefono" value="{{isset($empleado->Telefono)?$empleado->Telefono:''}}" required>
    </div>
    <div class="col">
    <label for="Correo">Correo:</label>
    <input type="email" class="form-control"name="Correo" id="Correo" value="{{isset($empleado->Correo)?$empleado->Correo:''}}" required>
    </div>
</div>
<div class="row mt-3">
    <div class="col">
    <label for="idDepartamento" >Departamento:</label>
    <select name="idDepartamentos" class="form-control" id="idDepartamentos">
    @foreach ($departamento as $item)
    @if(isset($empleado->idDepartamentos))
    {
        @if($item->idDepartamentos == $empleado->idDepartamentos)
        <option value="{{ $item->idDepartamentos }}" selected >{{ $item->NombreDepartamento }}</option>
        @else
        <option value="{{ $item->idDepartamentos }}">{{ $item->NombreDepartamento }}</option>
        @endif
    }
    @else{
        <option value="{{ $item->idDepartamentos }}">{{ $item->NombreDepartamento }}</option>
    }
    @endif
    @endforeach
    </select>
    </div>
</div>
<div class="row mt-3">
<div class="col-2">
    <input type="submit" class="btn btn-success" value="Guardar datos">
</div>
@if(isset($empleado))
    <div class="col-2 ml-1">
        <a href="{{route('empleado.index')}}" class="btn btn-danger">Cancelar</a>
    </div>
@endif
</div>
