<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tags_goods_pivot', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tag_id')->constrained('atest_tags')->cascadeOnDelete();
            $table->foreignId('good_id')->constrained('atest_goods')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tags_goods_pivot');
    }
};
