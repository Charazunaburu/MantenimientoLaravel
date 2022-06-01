<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    use HasFactory;

    protected $table="empleados";
        /**
        * The primary key for the model.
        *
        * @var string
        */
    protected $primaryKey = 'idEmpleados';
    protected $fillable = [
        'idDepartamento',
        'NomEmp',
        'ApllEmp',
        'Correo',
        'Telefono',
    ];

    public function getDateFormat()
    {
        return 'Y-d-m H:i:s.v';
    }
}
