<?php

use App\Models\Alamat\Kabupaten;
use App\Models\Alamat\Kecamatan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('desas', function (Blueprint $table) {
            $table->id();

            $table->string('nm_desa');
            $table->foreignIdFor(Kecamatan::class)->constrained();

            $table->string('nm_kades')->nullable(); // Kepala Desa
            $table->boolean('wil_admin')->default(true); // Wilayah Administratif
            $table->unsignedInteger('jml_penduduk')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desas');
    }
};
