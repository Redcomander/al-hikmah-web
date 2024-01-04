<?php

namespace App\Http\Controllers;

use App\Models\pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pendaftaran.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pendaftaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request to ensure the file is present and is an image (you may add more specific validation rules)
        $request->validate([
            'foto_3x4' => 'nullable|image', // Adjust validation rules as needed
            'file_ijazah' => 'nullable|image|pdf',
            'file_surat_lulusan' => 'nullable|image|pdf',
            'file_akte_lahir' => 'nullable|image|pdf',
            'file_kk' => 'nullable|image|pdf',
            'file_kartu_nisn' => 'nullable|image|pdf',
            'file_kartu_kip' => 'nullable|image|pdf',
            'file_kartu_pkh' => 'nullable|image|pdf',
            'file_kartu_kks' => 'nullable|image|pdf',
            'file_foto_rapot' => 'nullable|image',
        ]);

        // Handle file uploads
        $foto_3x4Path = $request->hasFile('foto_3x4') ? $request->file('foto_3x4')->store('foto_3x4_capel', 'public') : null;
        $fileIjazahPath = $request->hasFile('file_ijazah') ? $request->file('file_ijazah')->store('file_ijazah', 'public') : null;
        $fileSuratLulusanPath = $request->hasFile('file_surat_lulusan') ? $request->file('file_surat_lulusan')->store('file_surat_lulusan', 'public') : null;
        $fileAkteLahirPath = $request->hasFile('file_akte_lahir') ? $request->file('file_akte_lahir')->store('file_akte_lahir', 'public') : null;
        $fileKkPath = $request->hasFile('file_kk') ? $request->file('file_kk')->store('file_kk', 'public') : null;
        $fileKartuNisnPath = $request->hasFile('file_kartu_nisn') ? $request->file('file_kartu_nisn')->store('file_kartu_nisn', 'public') : null;
        $fileKartuKipPath = $request->hasFile('file_kartu_kip') ? $request->file('file_kartu_kip')->store('file_kartu_kip', 'public') : null;
        $fileKartuPkhPath = $request->hasFile('file_kartu_pkh') ? $request->file('file_kartu_pkh')->store('file_kartu_pkh', 'public') : null;
        $fileKartuKksPath = $request->hasFile('file_kartu_kks') ? $request->file('file_kartu_kks')->store('file_kartu_kks', 'public') : null;
        $fileFotoRapotPath = $request->hasFile('file_foto_rapot') ? $request->file('file_foto_rapot')->store('file_foto_rapot', 'public') : null;

        // Create the article with the stored file path and status
        pendaftaran::create([
            "nomor" => $request->nomor,
            "email_pendaftaran" => $request->email_pendaftaran,
            "nama_lengkap" => $request->nama_lengkap,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "jenis_kelamin" => $request->jenis_kelamin,
            "nisn" => $request->nisn,
            "agama" => $request->agama,
            "hobi" => $request->hobi,
            "cita-cita" => $request->cita_cita,
            "anak_ke" => $request->anak_ke,
            "jumlah_saudara_kandung" => $request->jumlah_saudara_kandung,
            "alamat" => $request->alamat,
            "rt_rw" => $request->rt_rw,
            "dusun" => $request->dusun,
            "desa" => $request->desa,
            "kecamatan" => $request->kecamatan,
            "kabupaten" => $request->kabupaten,
            "provinsi" => $request->provinsi,
            "kode_pos" => $request->kode_pos,
            "no_kk" => $request->no_kk,
            "kepala_keluarga" => $request->kepala_keluarga,
            "nama_ayah_kandung" => $request->nama_ayah_kandung,
            "tempat_lahir_ayah" => $request->tempat_lahir_ayah,
            "tanggal_lahir_ayah" => $request->tanggal_lahir_ayah,
            "nik_ayah" => $request->nik_ayah,
            "pekerjaan_ayah" => $request->pekerjaan_ayah,
            "no_hp_ayah" => $request->no_hp_ayah,
            "nama_ibu_kandung" => $request->nama_ibu_kandung,
            "tempat_lahir_ibu" => $request->tempat_lahir_ibu,
            "tanggal_lahir_ibu" => $request->tanggal_lahir_ibu,
            "nik_ibu" => $request->nik_ibu,
            "pekerjaan_ibu" => $request->pekerjaan_ibu,
            "no_hp_ibu" => $request->no_hp_ibu,
            "nama_wali" => $request->nama_wali,
            "tempat_lahir_wali" => $request->tempat_lahir_wali,
            "tanggal_lahir_wali" => $request->tanggal_lahir_wali,
            "penghasilan" => $request->penghasilan,
            "no_kks" => $request->no_kks,
            "no_pkh" => $request->no_pkh,
            "no_kip" => $request->no_kip,
            "asal_sekolah" => $request->asal_sekolah,
            "npsn_sekolah" => $request->npsn_sekolah,
            "alamat_sekolah" => $request->alamat_sekolah,
            "no_surat_lulus" => $request->no_surat_lulus,
            "no_blangko_ijazah" => $request->no_blangko_ijazah,
            "nilai_rata2_ijazah" => $request->nilai_rata2_ijazah,
            "foto_3x4" => $foto_3x4Path,
            "file_ijazah" => $fileIjazahPath,
            "file_surat_lulus" => $fileSuratLulusanPath,
            "file_akte_lahir" => $fileAkteLahirPath,
            "file_kk" => $fileKkPath,
            "file_kartu_nisn" => $fileKartuNisnPath,
            "file_kartu_kip" => $fileKartuKipPath,
            "file_kartu_pkh" => $fileKartuPkhPath,
            "file_kartu_kks" => $fileKartuKksPath,
            "file_foto_rapot" => $fileFotoRapotPath,
            "verified" => false, // Set default value to false
            "verified_by" => null, // Set default value to null
        ]);

        return redirect('pendaftarandepan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // PendaftaranController.php
    public function belumTerverifikasi()
    {
        return view('pendaftaran.unverify');
    }

    public function terverifikasi()
    {
        return view('pendaftaran.verify');
    }
}
