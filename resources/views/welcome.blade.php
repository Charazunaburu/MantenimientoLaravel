@extends('layouts.app')
@section('content')

<title>Lista de empleados</title>
<body>
<div class="container mt-5">
<div class="row mb-3 bg-success border border-light rounded">
        <div class="col">
        <h2 class="mb-4 mt-4 text-center text-white">Busqueda de Empleados</h2>
        </div>
    </div>
<!--<div class="row mb-3">
    <div class="col-1">
        <a class="text-secondary" href="#" data-toggle="modal" id="agregarButton" data-target="#agregarModal"
            data-attr="{{route('empleado.create')}}"><i class="fa-solid fa-circle-plus fa-xl "  style="color: #0ca678;"></i></a>
    </div>-->
</div>
<form enctype="multipart/form-data">
    @include('empleado.busqueda')
</form>

</div>

<div class="container mt-5">
    <div class="row mb-3 bg-success border border-light rounded">
        <div class="col">
        <h2 class="mb-4 mt-4 text-center text-white">Lista de empleados</h2>
        </div>
    </div>
    <div class="row border border-light rounded">
        <div class="col">
        <table class="table table-bordered yajra-datatable">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleado as $item)
                <tr>
                    <td>{{$item->idEmpleados}}</td>
                    <td>{{$item->NomEmp}}</td>
                    <td>{{$item->ApellEmp}}</td>
                    <td>
                    <a class=" btn btn-link text-secondary" href="#" data-toggle="modal" id="infoButton" data-target="#infoModal"  data-attr="{{route('empleado.show',$item->idEmpleados)}}"><i class="fas fa-eye"></i></a>
                    <a class=" btn btn-link text-secondary" href="{{url('empleado/'.$item->idEmpleados.'/edit')}}"><i class="fas fa-edit"></i></a>
                    <a class=" btn btn-link text-secondary" href="#" data-toggle="modal" id="deleteButton" data-target="#deleteModal" data-attr="{{route('empleado.delete',$item->idEmpleados)}}"><i class="fas fa-trash text-danger  fa-lg"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>

 <!-- Agregar modal -->
 <div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="agregarModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border border-light rounded bg-success">
                <h4 class="text-white">Agregando Empleados.</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mediumBody">
                    <div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- info modal -->
 <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success border border-light rounded">
                <h4 class="text-center text-white" >Informacion de Empleados.</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="infobody">
                    <div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="button" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete modal -->
    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" id="deletecontent">
                            <div>

                            </div>
                        </div>
                    </div>
                </div>

</body>
<script type="text/javascript">  
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        /*processing: true,
        serverSide: true,
        ajax: "{{route('empleado.list')}}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'NomEmp', name: 'NomEmp'},
            {data: 'ApellEmp', name: 'ApellEmp'},
            //{data: 'NombreDepartamento', name: 'NombreDepartamento'},
            //{data: 'Correo', name: 'Correo'},
            //{data: 'Telefono', name: 'Telefono'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]*/
    });  
  });

  //Mostrar modal para agreagar empleados
  $(document).on('click', '#agregarButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                success: function(result){
                    $('#agregarModal').modal('show');
                    $('#mediumBody').html(result).show();
                }
                });
        });
        //Mostrar modal para ver la informacion de los empleados
        $(document).on('click', '#infoButton', function(event) {
            event.preventDefault();
             let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                // return the result
                success: function(result) {
                    $('#infoModal').modal("show");
                    $('#infobody').html(result).show();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
        //mostrar modal eliminar
        $(document).on('click','#deleteButton', function(event){
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                success: function(result){
                    $('#deleteModal').modal("show");
                    $('#deletecontent').html(result).show();
                }
            })
        });
</script>
@endsection