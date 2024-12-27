<?php

use App\Models\Categories;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Categories::class);
            $table->foreignIdFor(User::class);
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('kontak');
            $table->text('alamat');
            $table->text('deskripsi');
            $table->string('maps');
            $table->string('image');
            $table->time('jamBuka');
            $table->time('jamTutup');
            $table->integer('dilihat')->default(0);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('umkms');
    }
};
