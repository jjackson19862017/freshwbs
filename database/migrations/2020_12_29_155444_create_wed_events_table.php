<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWedEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wed_events', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->unsigned();
            $table->date('holdtilldate')->nullable();
            $table->date('contractissueddate')->nullable();
            $table->date('weddingdate')->nullable();
            $table->date('quarterpaymentdate')->nullable();
            $table->date('finalweddingtalkdate')->nullable();
            $table->date('finalpaymentdate')->nullable();
            $table->text('notes')->nullable();
            $table->enum('onhold',['Yes','No'])->default('Yes');
            $table->enum('agreementsigned',['Yes','No'])->default('No');
            $table->enum('deposittaken',['Yes','No'])->default('No');
            $table->enum('quarterpaymenttaken',['Yes','No'])->default('No');
            $table->enum('hadfinaltalk',['Yes','No'])->default('No');
            $table->decimal('cost', $precision = 8, $scale = 2)->nullable();
            $table->enum('completed',['Yes','No'])->default('No');
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
        Schema::dropIfExists('wed_events');
    }
}
