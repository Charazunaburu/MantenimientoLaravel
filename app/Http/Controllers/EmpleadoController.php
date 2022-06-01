<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use App\Models\departamento;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
            $idDepa = $request->get('idDepartamentos')!==null?$request->get('idDepartamentos'):0; 
            $NomEmp = $request->get('NomEmp');
            $ApellEmp = $request->get('ApellEmp');
            $Telefono = !empty($request->get('Telefono'))?$request->get('Telefono'):0;
            $Correo = $request->get('Correo');
            $empleado = DB::select("EXECUTE PRAL_DATA_EMPLEADOS_DEPA 0,'$NomEmp','$ApellEmp',$idDepa,'$Correo',$Telefono");
        $departamento = DB::table('departamentos')->get();
        return view('welcome',compact('departamento','empleado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departamento = DB::table('departamentos')->get();
        return view('empleado.create',compact('departamento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetEmpleados()
    {
        /*$data = DB::table('empleados')
        ->join('departamentos', 'empleados.idDepartamentos', '=', 'departamentos.idDepartamentos')
        ->select(DB::raw("empleados.idEmpleados,empleados.NomEmp,departamentos.NombreDepartamento,empleados.ApellEmp,empleados.Correo,empleados.Telefono"))
        ->get();*/
        $data = DB::select('EXECUTE PRAL_DATA_EMPLEADOS_DEPA');
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtnEliminar = '<a class=" btn btn-link text-secondary" href="#" data-toggle="modal" id="deleteButton" data-target="#deleteModal" data-attr="'.route('empleado.delete',$row->idEmpleados).'"><i class="fas fa-trash text-danger  fa-lg"></i></a>';

                $actionBtnVerInfo = '<a class=" btn btn-link text-secondary" href="#" data-toggle="modal" id="infoButton" data-target="#infoModal"  data-attr="'.route('empleado.show',$row->idEmpleados).'"><i class="fas fa-eye"></i></a>';

                $actionBtn = $actionBtnVerInfo.'<a class="btn btn-link text-secondary" href="'.url("empleado/$row->idEmpleados/edit").'"><i class="fas fa-edit"></i></a>'.$actionBtnEliminar;
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosempleado = request()->except('_token');
        Empleado::insert($datosempleado);
        return redirect('empleado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $empleado = DB::table('empleados')
        ->join('departamentos', 'empleados.idDepartamentos', '=', 'departamentos.idDepartamentos')
        ->select(DB::raw("empleados.idEmpleados,empleados.NomEmp,departamentos.NombreDepartamento,empleados.ApellEmp,empleados.Correo,empleados.Telefono"))
        ->where('idEmpleados','=',$id)
        ->get();
        return view('empleado.show',compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado= Empleado::findOrFail($id);
        $departamento = DB::table('departamentos')->get();
        return view('empleado.edit', compact('empleado','departamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosEmpleado = request()->except(['_token','_method']);
        Empleado::where('idEmpleados','=',$id)->update($datosEmpleado);
        
        return redirect('empleado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Empleado::destroy($id);
        return redirect('empleado');
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function DeleteEmpleado($id)
    {
        //
        $empleado= Empleado::findOrFail($id);
        return view('empleado.delete',compact('empleado'));
    }
}
