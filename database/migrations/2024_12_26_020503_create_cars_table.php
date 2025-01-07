<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manufacturer_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->boolean('is_new_car')->default(false);
            $table->string('model');
            $table->year('year_manufactured')->nullable();
            $table->integer('car_color')->nullable(); // Car Enum
            $table->text('description')->nullable();
            $table->integer('car_price');
            $table->integer('car_sell_currency'); //Currency usd or sp;
            $table->integer('fuel_type')->nullable(); // FuelType Enumنوع الوقود(بنزين,ديزيل, كهرباء)
            $table->integer('car_sell_location')->nullable(); // مكان السيارة المعروضة للبيع
            $table->boolean('is_car_shippable_to_a_different_city')->nullable(); // هل السيارة ممكن شحنها إلى مدينة أخرى في حال اختلاف مكان البائع والشاري
            $table->integer('car_import_type'); //ImportType ظريقة اﻹدخال أوروبي جديد,قديم
            $table->integer('car_label_origin'); // حماة,حصص .اﻷرمة
            $table->integer('transmission')->nullable(); //TrnsmissionType enum. manaul or automatic عادي, أوتوماتيك
            $table->integer('miles_travelled_in_km'); // عدد الكيلومترات المقطوعة في السيارة
            $table->boolean('has_tuf_check_passed')->nullable(); // overall check performed on cars and other vehicles every two years in Germany.
            $table->boolean('user_has_legal_car_papers')->nullable(); //   أوراق السيارة(نظامية) موجودة عند المالك
            $table->boolean('faragha_jahzeh')->nullable()->default(false); // الفراغة جاهزة https://www.facebook.com/permalink.php/?story_fbid=3604791969565535&id=1909195695791846
            // $table->boolean('is_kassah'); //سيارة بدون قيود جمركية  https://www.suwar-magazine.org/articles/2079_%D8%B3%D9%8A%D8%A7%D8%B1%D8%A7%D8%AA-%D8%A7%D9%84%D9%82-%D8%B5%D8%A9-%D8%AA%D8%BA%D8%B2%D9%88-%D8%A3%D8%B3%D9%88%D8%A7%D9%82-%D8%B4%D9%85%D8%A7%D9%84%D9%8A-%D8%B3%D9%88%D8%B1%D9%8A%D8%A7
            $table->boolean('is_tajrobeh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
