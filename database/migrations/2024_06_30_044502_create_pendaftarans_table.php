<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->string('nama');
            $table->string('gender');
            $table->string('ttl')->nullable();
            $table->string('alamat');
            $table->string('asal_sekolah')->nullable();
            $table->string('izajah')->nullable();
            $table->string('bukti_bayar')->nullable();
            $table->string('status_daftar')->default('Terdaftar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftarans');
    }
}
