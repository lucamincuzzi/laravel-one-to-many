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
        Schema::table('projects', function (Blueprint $table) {
            // Aggiunta della colonna
            $table->unsignedBigInteger('type_id')->nullable()->after('title');

            // Assegnazione FK
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Rimozione della FK
            $table->dropForeign('projects_type_id_foreign');

            // Drop della colonna
            $table->dropColumn('type_id');
        });
    }
};
