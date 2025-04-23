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
            $table->foreignId('user_id')->constrained();
            $table->integer('miles_travelled_in_km');
            $table->date('car_upload_start_date');
            $table->date('car_upload_expiration_date');
            $table->integer('car_name_language_when_uploaded');
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->integer('car_sell_location')->nullable(); // مكان السيارة المعروضة للبيع
            $table->boolean('is_new_car')->nullable()->default(false);
            $table->integer('car_price');
            $table->integer('fuel_type')->nullable(); // FuelType Enumنوع الوقود(بنزين,ديزيل, كهرباء)
            $table->integer('transmission')->nullable(); // TrnsmissionType enum. manaul or automatic عادي, أوتوماتيك
            $table->boolean('is_faragha_jahzeh')->nullable()->default(false); // جاهزة لنفل الملكية للشخص الآخر, تأكد مطلوب
            $table->boolean('is_kassah')->nullable(); // سيارة بدون قيود جمركية  https://www.suwar-magazine.org/articles/2079_%D8%B3%D9%8A%D8%A7%D8%B1%D8%A7%D8%AA-%D8%A7%D9%84%D9%82-%D8%B5%D8%A9-%D8%AA%D8%BA%D8%B2%D9%88-%D8%A3%D8%B3%D9%88%D8%A7%D9%82-%D8%B4%D9%85%D8%A7%D9%84%D9%8A-%D8%B3%D9%88%D8%B1%D9%8A%D8%A7
            $table->boolean('is_khalyeh')->nullable(); // https://asuaaq.com/blog-detail/421
            $table->boolean('is_sold')->default(false);
            $table->integer('views')->default(0);
            $table->timestamps();

            // $table->year('year_manufactured')->nullable();
            // $table->integer('car_color')->nullable(); // Car Enum
            // $table->text('description')->nullable();
            // $table->integer('car_sell_currency')->nullable(); // Currency usd or sp;
            // $table->boolean('is_car_shippable_to_a_different_city')->nullable(); // هل السيارة ممكن شحنها إلى مدينة أخرى في حال اختلاف مكان البائع والشاري
            // $table->integer('car_import_type')->nullable(); // ImportType ظريقة اﻹدخال أوروبي جديد,قديم
            // $table->integer('car_label_origin')->nullable(); // حماة,حصص .اﻷرمة
            // $table->boolean('has_tuf_check_passed')->nullable(); // overall check performed on cars and other vehicles every two years in Germany.
            // $table->boolean('user_has_legal_car_papers')->nullable(); //   أوراق السيارة(نظامية) موجودة عند المالك
            // الفراغة جاهزة https://www.facebook.com/permalink.php/?story_fbid=3604791969565535&id=1909195695791846
            // $table->boolean('is_tajrobeh')->nullable();
            // $table->boolean('is_recommended')->default(false);
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
