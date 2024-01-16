<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftaranExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pendaftaran::select(
            'no_registrasi',
            'email_pendaftar',
            'nama_lengkap',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'nisn',
            'nik',
            'agama',
            'hobi',
            'cita_cita',
            'anak_ke',
            'jumlah_saudara_kandung',
            'alamat',
            'rt_rw',
            'dusun',
            'desa',
            'kecamatan',
            'kabupaten',
            'provinsi',
            'kode_pos',
            'no_kk',
            'kepala_keluarga',
            'nama_ayah_kandung',
            'status_ayah',
            'alamat_ayah',
            'nik_ayah',
            'pekerjaan_ayah',
            'nama_ibu_kandung',
            'status_ibu',
            'nik_ibu',
            'pekerjaan_ibu',
            'alamat_ibu',
            'nama_wali',
            'nik_wali',
            'alamat_wali',
            'penghasilan',
            'no_kks',
            'no_pkh',
            'no_kip',
            'asal_sekolah',
            'npsn_sekolah',
            'alamat_sekolah',
            'no_surat_lulus',
            'no_blangko_ijazah',
            'nilai_rata2_ijazah',
            'verified_by',
            'created_at',
            'updated_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'No Registrasi',
            'Email Pendaftar',
            'Nama Lengkap',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'NISN',
            'NIK',
            'Agama',
            'Hobi',
            'Cita-cita',
            'Anak ke',
            'Jumlah Saudara Kandung',
            'Alamat',
            'RT/RW',
            'Dusun',
            'Desa',
            'Kecamatan',
            'Kabupaten',
            'Provinsi',
            'Kode Pos',
            'No KK',
            'Kepala Keluarga',
            'Nama Ayah Kandung',
            'Status Ayah',
            'Alamat Ayah',
            'NIK Ayah',
            'Pekerjaan Ayah',
            'Nama Ibu Kandung',
            'Status Ibu',
            'NIK Ibu',
            'Pekerjaan Ibu',
            'Alamat Ibu',
            'Nama Wali',
            'NIK Wali',
            'Alamat Wali',
            'Penghasilan',
            'No KKS',
            'No PKH',
            'No KIP',
            'Asal Sekolah',
            'NPSN Sekolah',
            'Alamat Sekolah',
            'No Surat Lulus',
            'No Blangko Ijazah',
            'Nilai Rata-rata Ijazah',
            'Verified By',
            'Created At',
            'Updated At',
        ];
    }
}
