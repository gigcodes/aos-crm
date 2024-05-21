<?php

use App\Models\ClickUpTask;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('click_up_task_attachments', function (Blueprint $table) {
            $table->id();
            $table->string('click_up_id');
            $table->string('file_path');
            $table->foreignIdFor(ClickUpTask::class)->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('click_up_task_attachments');
    }
};
