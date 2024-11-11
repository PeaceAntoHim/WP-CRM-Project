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
    Schema::table('sales', function (Blueprint $table) {
        $table->decimal('amount', 50, 2)->change();  // Adjust precision and scale as needed
    });
}

public function down()
{
    Schema::table('sales', function (Blueprint $table) {
        $table->integer('amount')->change(); // or revert to the original type
    });
}

};
