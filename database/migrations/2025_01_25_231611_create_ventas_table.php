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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_hora');
            $table->decimal('impuesto',8,2,true);
            $table->string('numero_comprobante',255);
            $table->string('total',8,2,true);

            $table->tinyInteger('estado')->default(1);
            
            $table->foreignId('cliente_id')->nullable()->contrained('clientes')->onDelete('set null');
            $table->foreignId('user_id')->nullable()->contrained('users')->onDelete('set null');
            $table->foreignId('comprobante_id')->nullable()->contrained('comprobantes')->onDelete('set null');
     

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
        Schema::dropIfExists('ventas');
    }
};
