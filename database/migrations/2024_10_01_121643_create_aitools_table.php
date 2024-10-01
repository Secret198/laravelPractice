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
        Schema::create('aitools', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_id");
            $table->foregin("category_id")->references("id")->on("categories");
            $table->strip_tags("name");
            $table->text("description");
            $table->string("link");
            $table->boolean("hasFreePlan")->default(false);
            $table->decimal("price", 5, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aitools');
    }
};
