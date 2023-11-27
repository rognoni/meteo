<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
    php artisan make:model Forecast --migration

    php artisan migrate --pretend
        create table `forecasts` (`id` bigint unsigned not null auto_increment primary key, `latitude` varchar(100) not null, `longitude` varchar(100) not null, `response` longtext null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci' 

*/
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('forecasts', function (Blueprint $table) {
            $table->id();

            $table->string('latitude', 100);
            $table->string('longitude', 100);
            $table->longText('response')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forecasts');
    }
};
