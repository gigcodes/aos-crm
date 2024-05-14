<?php

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('clickup_id');
            $table->string('name');
            $table->string('text_content');
            $table->string('description');
            $table->dateTime('date_closed');
            $table->dateTime('date_done');
            $table->boolean('archived');
            $table->string('permission_level');
            $table->string('priority');
            $table->string('parent_id');
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Team::class);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
