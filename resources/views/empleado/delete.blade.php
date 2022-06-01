<form method="post" class="d-inline" action="{{url('/empleado/'.$empleado->idEmpleados)}}">
<div class="modal-header border border-light bg-success">
    <h4 class="modal-title text-white text-center">Eliminar Empleado.</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <p class="text-center">¿Deseas borrar el registro de {{$empleado->NomEmp}} {{$empleado->ApellEmp}}</p>
</div>
<div class="modal-footer">
    @csrf
    {{method_field('DELETE')}}
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-success">Eliminar</button>
</div>
</form>