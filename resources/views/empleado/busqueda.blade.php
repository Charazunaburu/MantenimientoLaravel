<div class="row">
    <div class="col">
    <label for="NomEmp" >Nombre:</label> 
    <input type="text" class="form-control"name="NomEmp" id="NomEmp">
    </div>
    <div class="col">
    <label for="ApellEmp" value="Apellido">Apellido:</label>
    <input type="text" class="form-control"name="ApellEmp" id="ApellEmp">
    </div>
</div>
<div class="row mt-3">
    <div class="col">
    <label for="Telefono" >Telefono:</label>
    <input type="number" class="form-control"name="Telefono" id="Telefono" >
    </div>
    <div class="col">
    <label for="Correo">Correo:</label>
    <input type="email" class="form-control"name="Correo" id="Correo">
    </div>
</div>
<div class="row mt-3">
    <div class="col">
    <label for="idDepartamento" >Departamento:</label>
    <select name="idDepartamentos" class="form-control" id="idDepartamentos">
        <option value=0 selected>Seleccione un departamento</option>
    @foreach ($departamento as $item)
        <option value="{{ $item->idDepartamentos }}">{{ $item->NombreDepartamento }}</option>
    @endforeach
    </select>
    </div>
</div>
<div class="row  mt-3">
<div class="col-11">
    <a class="btn btn-link" href="#" data-toggle="modal" id="agregarButton" data-target="#agregarModal"
        data-attr="{{route('empleado.create')}}"><i class="fa-solid fa-circle-plus fa-xl "  style="color: #0ca678;"></i></a>
</div>
<div class="col-1 ">
    <button type="submit" class="btn btn-link" style="color: #0ca678;" value="Buscar"><i class="fa-solid fa-magnifying-glass fa-xl"></i></button>
</div>
</div>