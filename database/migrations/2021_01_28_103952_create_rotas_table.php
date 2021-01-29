<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rotas', function (Blueprint $table) {
            $table->id();
            $table->integer('Staff_Id')->unsigned();
            $table->date('WeekCommencing');
            $table->string('Hotel')->default('Shard');
            $table->time('MondayStartOne')->nullable();
            $table->time('MondayFinishOne')->nullable();
            $table->enum('MondayRoleOne',['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'],['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'])->nullable();
            $table->time('MondayStartTwo')->nullable();
            $table->time('MondayFinishTwo')->nullable();
            $table->enum('MondayRoleTwo',['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'],['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'])->nullable();
            $table->time('TuesdayStartOne')->nullable();
            $table->time('TuesdayFinishOne')->nullable();
            $table->enum('TuesdayRoleOne',['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'],['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'])->nullable();
            $table->time('TuesdayStartTwo')->nullable();
            $table->time('TuesdayFinishTwo')->nullable();
            $table->enum('TuesdayRoleTwo',['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'],['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'])->nullable();
            $table->time('WednesdayStartOne')->nullable();
            $table->time('WednesdayFinishOne')->nullable();
            $table->enum('WednesdayRoleOne',['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'],['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'])->nullable();
            $table->time('WednesdayStartTwo')->nullable();
            $table->time('WednesdayFinishTwo')->nullable();
            $table->enum('WednesdayRoleTwo',['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'],['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'])->nullable();
            $table->time('ThursdayStartOne')->nullable();
            $table->time('ThursdayFinishOne')->nullable();
            $table->enum('ThursdayRoleOne',['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'],['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'])->nullable();
            $table->time('ThursdayStartTwo')->nullable();
            $table->time('ThursdayFinishTwo')->nullable();
            $table->enum('ThursdayRoleTwo',['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'])->nullable();
            $table->time('FridayStartOne')->nullable();
            $table->time('FridayFinishOne')->nullable();
            $table->enum('FridayRoleOne',['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'])->nullable();
            $table->time('FridayStartTwo')->nullable();
            $table->time('FridayFinishTwo')->nullable();
            $table->enum('FridayRoleTwo',['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'])->nullable();
            $table->time('SaturdayStartOne')->nullable();
            $table->time('SaturdayFinishOne')->nullable();
            $table->enum('SaturdayRoleOne',['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'])->nullable();
            $table->time('SaturdayStartTwo')->nullable();
            $table->time('SaturdayFinishTwo')->nullable();
            $table->enum('SaturdayRoleTwo',['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'])->nullable();
            $table->time('SundayStartOne')->nullable();
            $table->time('SundayFinishOne')->nullable();
            $table->enum('SundayRoleOne',['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'])->nullable();
            $table->time('SundayStartTwo')->nullable();
            $table->time('SundayFinishTwo')->nullable();
            $table->enum('SundayRoleTwo',['Reception','FOH','Housekeeping','Kitchen','Stock Take','The Mill','Sick','Holiday'])->nullable();
            $table->time('MondayHoursOne')->nullable();
            $table->time('MondayHoursTwo')->nullable();
            $table->time('TuesdayHoursOne')->nullable();
            $table->time('TuesdayHoursTwo')->nullable();
            $table->time('WednesdayHoursOne')->nullable();
            $table->time('WednesdayHoursTwo')->nullable();
            $table->time('ThursdayHoursOne')->nullable();
            $table->time('ThursdayHoursTwo')->nullable();
            $table->time('FridayHoursOne')->nullable();
            $table->time('FridayHoursTwo')->nullable();
            $table->time('SaturdayHoursOne')->nullable();
            $table->time('SaturdayHoursTwo')->nullable();
            $table->time('SundayHoursOne')->nullable();
            $table->time('SundayHoursTwo')->nullable();
            $table->time('TotalHours')->nullable();
            // Sick Days Taken
            $table->integer('SickDays')->nullable()->unsigned()->default(0);
            // Holiday Days Taken
            $table->integer('HolidayDays')->nullable()->unsigned()->default(0);
            // Job Scheme
            $table->time('JsHours')->nullable();
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
        Schema::dropIfExists('rotas');
    }
}
