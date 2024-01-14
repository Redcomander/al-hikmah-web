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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('no_registrasi')->nullable();
            $table->string('email_pendaftar')->nullable();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nik')->nullable();
            $table->string('agama')->nullable();
            $table->string('hobi')->nullable();
            $table->string('cita_cita')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('jumlah_saudara_kandung')->nullable();
            $table->text('alamat')->nullable();
            $table->string('rt_rw')->nullable();
            $table->string('dusun')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('kepala_keluarga')->nullable();
            $table->string('nama_ayah_kandung')->nullable();
            $table->string('status_ayah')->nullable();
            $table->string('alamat_ayah')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('nama_ibu_kandung')->nullable();
            $table->string('status_ibu')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('alamat_ibu')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('nik_wali')->nullable();
            $table->string('alamat_wali')->nullable();
            $table->string('penghasilan')->nullable();
            $table->string('no_kks')->nullable();
            $table->string('no_pkh')->nullable();
            $table->string('no_kip')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('npsn_sekolah')->nullable();
            $table->string('alamat_sekolah')->nullable();
            $table->string('no_surat_lulus')->nullable();
            $table->string('no_blangko_ijazah')->nullable();
            $table->string('nilai_rata2_ijazah')->nullable();
            $table->string('foto_3x4')->nullable();
            $table->string('file_ijazah')->nullable();
            $table->string('file_surat_lulus')->nullable();
            $table->string('file_akte_lahir')->nullable();
            $table->string('file_kk')->nullable();
            $table->string('file_kartu_nisn')->nullable();
            $table->string('file_kartu_kip')->nullable();
            $table->string('file_kartu_pkh')->nullable();
            $table->string('file_kartu_kks')->nullable();
            $table->string('file_foto_rapot')->nullable();
            $table->boolean('verified')->default(false);
            $table->string('verified_by')->nullable(); // Add this line
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
