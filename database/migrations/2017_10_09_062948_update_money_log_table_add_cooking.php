<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMoneyLogTableAddCooking extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('money_log', function (Blueprint $table) {
            $table->boolean('is_cooking')->default(false);
            $table->integer('pay_chef')->default(0);
            $table->integer('pay_member')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('money_log', function (Blueprint $table) {
            //
        });
    }
}
