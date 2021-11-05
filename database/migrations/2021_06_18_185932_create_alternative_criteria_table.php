<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternativeCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternative_criteria', function (Blueprint $table) {
            $table->foreignId('alternative_id')->cascadeOnDelete()->constrained();
            $table->foreignId('criteria_id')->cascadeOnDelete()->constrained();
            $table->float('value');
            $table->foreignId('project_id')->cascadeOnDelete()->constrained();
            $table->primary(['alternative_id','criteria_id']);
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
        Schema::dropIfExists('alternative_criteria');
    }
}
