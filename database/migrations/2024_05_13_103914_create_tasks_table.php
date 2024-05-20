<?php

use App\Models\ClickUpTeam;
use App\Models\ClickUpUser;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('click_up_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('click_up_id');
            $table->string('name');
            $table->string('text_content')->nullable();
            $table->string('description')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->boolean('archived')->default(false);
            $table->string('permission_level')->nullable();
            $table->string('priority')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreignIdFor(ClickUpUser::class);
            $table->foreignIdFor(ClickUpTeam::class);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('click_up_tasks');
    }
};
