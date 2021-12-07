<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('fizzy')->nullable()->default('0.0');
            $table->boolean('light_switch')->nullable()->default(0);
            $table->boolean('smooth_switch')->nullable()->default(0);
            $table->boolean('dry_switch')->nullable()->default(0);
            $table->boolean('soft_switch')->nullable()->default(0);
            $table->boolean('fizzy_switch')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropColumn('fizzy');
            $table->dropColumn('light_switch');
            $table->dropColumn('smooth_switch');
            $table->dropColumn('dry_switch');
            $table->dropColumn('soft_switch');
            $table->dropColumn('fizzy_switch');

        });
    }
}
