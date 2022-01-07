<?php

use App\Models\Material;
use App\Models\Subject;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToMaterialSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('material_subject', function (Blueprint $table) {
            $table->foreign('material_id')
                ->references('id')
                ->on((new Material())->getTable())
                ->onDelete('cascade');
            $table->foreign('subject_id')
                ->references('id')
                ->on((new Subject())->getTable())
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('material_subject', function (Blueprint $table) {
            $table->dropForeign('material_id');
            $table->dropForeign('subject_id');
        });
    }
}
