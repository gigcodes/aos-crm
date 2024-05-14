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
            $table->string('text_content')->nullable();
            $table->string('description')->nullable();
            $table->dateTime('date_closed')->nullable();
            $table->dateTime('date_done')->nullable();
            $table->boolean('archived')->default(false);
            $table->string('permission_level')->nullable();
            $table->string('priority');
            $table->unsignedBigInteger('parent_id')->nullable();
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
