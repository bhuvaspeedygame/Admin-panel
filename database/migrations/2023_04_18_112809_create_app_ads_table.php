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
        Schema::create('app_ads', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('package_name')->nullable();
            $table->string('app_icon')->nullable();
            $table->string('select_console')->nullable();
            $table->string('banner_id')->nullable();
            $table->string('interstitial_id')->nullable();
            $table->string('app_openid')->nullable();
            $table->string('native_id')->nullable();
            $table->string('rewarded_id')->nullable();
            $table->string('interstitial_loading')->nullable();
            $table->string('open_ad_loading')->nullable();
            $table->string('interstitial_click')->nullable();
            $table->string('open_ad_click')->nullable();
            $table->string('is_open_ad')->nullable();
            $table->string('is_banner')->nullable();
            $table->string('is_native')->nullable();
            $table->string('is_on_back')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_ads');
    }
};
