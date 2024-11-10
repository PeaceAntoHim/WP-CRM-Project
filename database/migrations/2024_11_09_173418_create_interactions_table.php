<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteractionsTable extends Migration
{
    public function up()
    {
        Schema::create('interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_id')->constrained('contacts');
            $table->enum('type', ['email', 'phone', 'meeting']);
            $table->text('note');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('interactions');
    }
}
