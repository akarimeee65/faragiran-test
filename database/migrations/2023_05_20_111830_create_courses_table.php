<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        /**
         * Dummy Data
         */
//        DB::statement("INSERT INTO `courses` (`id`, `name`) VALUES (1, 'دوره لاراول تخصصی'), (2, 'متخصصی Javascript'), (3, 'دوره صفر تا صد Python'), (4, 'دوره آموزشی UI/UX'), (5, 'برنامه نویس فرانت اند - ReactJs'), (6, 'دوره حرفه ای Java'), (7, 'دوره تخصصی هنر شی گرایی'), (8, 'سئوی تکنیکال - متخصص سئو شو'), (9, 'هوش مصنوعی در پایتون'), (10, 'آموزش زبان برنامه نویسی Golang');");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
