<div class="container">
    <div class="row">
        <div class="col-md-5 bg-light border border-light rounded " >
            <label for="" class="font-weight-bold">Nombre:</label>
            <label for="Nombre">{{$empleado[0]->NomEmp}}</label>
        </div>
        <div class="col-md-6 ml-auto bg-light border border-light rounded">
            <label for="" class="font-weight-bold">Apellido:</label>
            <label for="Apellido">{{$empleado[0]->ApellEmp}}</label>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-5 bg-light border border-light rounded">
            <label for="" class="font-weight-bold">Telefono:</label>
            <label for="Telefono">{{$empleado[0]->Telefono}}</label>
        </div>
        <div class="col-md-6 ml-auto bg-light border border-light rounded">
            <label for="" class="font-weight-bold">Correo:</label>
            <label for="Correo">{{$empleado[0]->Correo}}</label>
        </div>
    </div>
    <div class="row mt-3">
    <div class="col bg-light border border-light rounded">
            <label for="" class="font-weight-bold">Departamento:</label>
            <label for="Departamento">{{$empleado[0]->NombreDepartamento}}</label>
    </div>
    </div>
</div>


            
