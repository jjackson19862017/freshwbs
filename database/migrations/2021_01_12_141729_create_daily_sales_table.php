<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailySalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_sales', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->date('date')->unique();
            $table->string('hotel');
            $table->decimal('iou',$precision = 8, $scale = 2)->nullable();
            $table->decimal('bacs',$precision = 8, $scale = 2)->nullable();
            $table->decimal('cheque',$precision = 8, $scale = 2)->nullable();
            $table->integer('notefifty')->unsigned()->nullable();
            $table->integer('notetwenty')->unsigned()->nullable();
            $table->integer('noteten')->unsigned()->nullable();
            $table->integer('notefive')->unsigned()->nullable();
            $table->integer('coinonepound')->unsigned()->nullable();
            $table->integer('coinfifty')->unsigned()->nullable();
            $table->integer('cointwenty')->unsigned()->nullable();
            $table->integer('cointen')->unsigned()->nullable();
            $table->integer('coinfive')->unsigned()->nullable();
            $table->integer('cointwo')->unsigned()->nullable();
            $table->integer('coinone')->unsigned()->nullable();
            $table->decimal('totalnotefifty',$precision = 8, $scale = 2)->unsigned()->nullable();
            $table->decimal('totalnotetwenty',$precision = 8, $scale = 2)->unsigned()->nullable();
            $table->decimal('totalnoteten',$precision = 8, $scale = 2)->unsigned()->nullable();
            $table->decimal('totalnotefive',$precision = 8, $scale = 2)->unsigned()->nullable();
            $table->decimal('totalcoinonepound',$precision = 8, $scale = 2)->unsigned()->nullable();
            $table->decimal('totalcoinfifty',$precision = 8, $scale = 2)->unsigned()->nullable();
            $table->decimal('totalcointwenty',$precision = 8, $scale = 2)->unsigned()->nullable();
            $table->decimal('totalcointen',$precision = 8, $scale = 2)->unsigned()->nullable();
            $table->decimal('totalcoinfive',$precision = 8, $scale = 2)->unsigned()->nullable();
            $table->decimal('totalcointwo',$precision = 8, $scale = 2)->unsigned()->nullable();
            $table->decimal('totalcoinone',$precision = 8, $scale = 2)->unsigned()->nullable();
            $table->decimal('cashtotal',$precision = 8, $scale = 2)->unsigned()->nullable();
            $table->decimal('float',$precision = 8, $scale = 2)->nullable();
            $table->decimal('pdqreception',$precision = 8, $scale = 2)->nullable();
            $table->decimal('pdqbar',$precision = 8, $scale = 2)->nullable();
            $table->decimal('pdqrestaurant',$precision = 8, $scale = 2)->nullable();
            $table->decimal('cardtotal',$precision = 8, $scale = 2)->nullable();
            $table->decimal('gpostotal',$precision = 8, $scale = 2)->nullable();
            $table->decimal('cashsafe',$precision = 8, $scale = 2)->nullable();
            $table->decimal('total',$precision = 8, $scale = 2)->nullable();
            $table->integer('roomssold')->unsigned();
            $table->integer('roomsoccupied')->unsigned();
            $table->integer('residents')->unsigned();
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
        Schema::dropIfExists('daily_sales');
    }
}
