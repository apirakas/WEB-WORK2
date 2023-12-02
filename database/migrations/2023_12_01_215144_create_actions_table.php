<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->string('nom_action');
            $table->string('devise');
            $table->decimal('prix_unitaire_achat', 10, 2);
            $table->decimal('prix_unitaire_vente', 10, 2);
            $table->decimal('frais', 10, 2);
            $table->integer('quantite');
            $table->date('date_vente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('actions');
    }
};
