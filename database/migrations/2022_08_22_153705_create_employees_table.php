<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();  
            $table->foreignId('taches_id')->constrained()->cascadeOnDelete();  
          
            $table->string('الاسم');
           
                $table->string('nom');
                
                $table->string('cin');
                $table->string('Numero financier');
                $table->date('date_naissance');
                $table->string('situtaion familiale');
                $table->string('telephone');
                $table->string('adresse');
                $table->date('date_embauche');
                $table->date('date_embauche_tribunal');
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
        Schema::dropIfExists('employees');
    }
};
