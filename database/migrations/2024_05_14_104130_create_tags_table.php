<?php

use App\Models\ClickUpUser;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('click_up_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tag_fg');
            $table->string('tag_bg');
            $table->foreignIdFor(ClickUpUser::class, 'creator_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('click_up_tags');
    }
};
