<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->after('id'); // creiamo la colonna 'category_id' che può essere 'NULL' e dovrà posizionarsi dopo la colonna 'ID'

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null');  //dico che la colonna creata prima è una FK , set_null= quando viene cancellato mi da null e non mi da errore
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['category_id']); //elimino la foreign key
            $table->dropColumn('category_id'); // elimino la colonna
        });
    }
}
