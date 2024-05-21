<?php

use App\Models\ClickUpFolder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('click_up_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('click_up_id');
            $table->foreignIdFor(ClickUpFolder::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('click_up_lists');
    }
};
