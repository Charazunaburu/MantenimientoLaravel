<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('idEmpleados');
            $table->unsignedBigInteger('idDepartamentos');
            $table->string('NomEmp');
            $table->string('ApellEmp');
            $table->string('Correo');
            $table->integer('Telefono');
            $table->foreign('idDepartamentos')->references('idDepartamentos')->on('departamentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
