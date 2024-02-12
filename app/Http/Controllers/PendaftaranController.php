<?php

namespace App\Http\Controllers;

use App\Exports\PendaftaranExport;
use App\Models\Pendaftaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Exporter;
use Maatwebsite\Excel\Facades\Excel;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $searchField = $request->input('search_field');

        $pendaftaran = Pendaftaran::query();

        if (!empty($search)) {
            $pendaftaran->where($searchField, 'LIKE', '%' . $search . '%');
        }

        $pendaftaran = $pendaftaran->paginate(10);

        return view('pendaftaran.index', compact('pendaftaran'));
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
        // dd($request->all());
        // Validate the request to ensure the file is present and is an image (you may add more specific validation rules)
        $request->validate([
            'foto_3x4' => 'nullable|image|max:5120', // 5MB in kilobytes
            'file_ijazah' => 'nullable|mimes:jpeg,png,pdf|max:5120',
            'file_surat_lulusan' => 'nullable|mimes:jpeg,png,pdf|max:5120',
            'file_akte_lahir' => 'nullable|mimes:jpeg,png,pdf|max:5120',
            'file_kk' => 'nullable|mimes:jpeg,png,pdf|max:5120',
            'file_kartu_nisn' => 'nullable|mimes:jpeg,png,pdf|max:5120',
            'file_kartu_kip' => 'nullable|mimes:jpeg,png,pdf|max:5120',
            'file_kartu_pkh' => 'nullable|mimes:jpeg,png,pdf|max:5120',
            'file_kartu_kks' => 'nullable|mimes:jpeg,png,pdf|max:5120',
            'file_foto_rapot' => 'nullable|image|max:5120',
        ]);

        // Handle file uploads
        $foto_3x4Path = $request->hasFile('foto_3x4') ? $request->file('foto_3x4')->store('foto_3x4_capel', 'public') : null;
        $fileIjazahPath = $request->hasFile('file_ijazah') ? $request->file('file_ijazah')->store('file_ijazah_capel', 'public') : null;
        $fileSuratLulusanPath = $request->hasFile('file_surat_lulusan') ? $request->file('file_surat_lulusan')->store('file_surat_lulusan', 'public') : null;
        $fileAkteLahirPath = $request->hasFile('file_akte_lahir') ? $request->file('file_akte_lahir')->store('file_akte_lahir', 'public') : null;
        $fileKkPath = $request->hasFile('file_kk') ? $request->file('file_kk')->store('file_kk', 'public') : null;
        $fileKartuNisnPath = $request->hasFile('file_kartu_nisn') ? $request->file('file_kartu_nisn')->store('file_kartu_nisn', 'public') : null;
        $fileKartuKipPath = $request->hasFile('file_kartu_kip') ? $request->file('file_kartu_kip')->store('file_kartu_kip', 'public') : null;
        $fileKartuPkhPath = $request->hasFile('file_kartu_pkh') ? $request->file('file_kartu_pkh')->store('file_kartu_pkh', 'public') : null;
        $fileKartuKksPath = $request->hasFile('file_kartu_kks') ? $request->file('file_kartu_kks')->store('file_kartu_kks', 'public') : null;
        $fileFotoRapotPath = $request->hasFile('file_foto_rapot') ? $request->file('file_foto_rapot')->store('file_foto_rapot', 'public') : null;

        // Get the maximum value of nomor_registrasi from the database
        $maxNomorPendaftaran = Pendaftaran::max('no_registrasi');

        // Increment the maximum value to generate the next nomor_pendaftaran
        $nextNomorPendaftaran = $maxNomorPendaftaran + 1;

        // Create the article with the stored file path and status
        Pendaftaran::create([
            "no_registrasi" => $nextNomorPendaftaran,
            "email_pendaftar" => $request->email_pendaftar,
            "nama_lengkap" => $request->nama_lengkap,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "jenis_kelamin" => $request->jenis_kelamin,
            "nisn" => $request->nisn,
            "nik" => $request->nik,
            "agama" => $request->agama,
            "hobi" => $request->hobi,
            "cita_cita" => $request->cita_cita,
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
            "status_ayah" => $request->status_ayah,
            "nik_ayah" => $request->nik_ayah,
            "pekerjaan_ayah" => $request->pekerjaan_ayah,
            "alamat_ayah" => $request->alamat_ayah,
            "nama_ibu_kandung" => $request->nama_ibu_kandung,
            "status_ibu" => $request->status_ibu,
            "nik_ibu" => $request->nik_ibu,
            "pekerjaan_ibu" => $request->pekerjaan_ibu,
            "alamat_ibu" => $request->alamat_ibu,
            "nama_wali" => $request->nama_wali,
            "nik_wali" => $request->nik_wali,
            "alamat_wali" => $request->alamat_wali,
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
        ]);


        if (auth()->check()) {
            return redirect('pendaftaran');
        } else {
            return redirect('verification');
        }
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
    public function edit(Pendaftaran $pendaftaran)
    {
        return view('pendaftaran.edit', compact('pendaftaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $currentPendaftaran = Pendaftaran::find($id);

        $foto_3x4Path = $request->hasFile('foto_3x4') ? $request->file('foto_3x4')->store('foto_3x4_capel', 'public') : $currentPendaftaran->foto_3x4;
        $fileIjazahPath = $request->hasFile('file_ijazah') ? $request->file('file_ijazah')->store('file_ijazah', 'public') : $currentPendaftaran->file_ijazah;
        $fileSuratLulusanPath = $request->hasFile('file_surat_lulusan') ? $request->file('file_surat_lulusan')->store('file_surat_lulusan', 'public') : $currentPendaftaran->file_surat_lulusan;
        $fileAkteLahirPath = $request->hasFile('file_akte_lahir') ? $request->file('file_akte_lahir')->store('file_akte_lahir', 'public') : $currentPendaftaran->file_akte_lahir;
        $fileKkPath = $request->hasFile('file_kk') ? $request->file('file_kk')->store('file_kk', 'public') : $currentPendaftaran->file_kk;
        $fileKartuNisnPath = $request->hasFile('file_kartu_nisn') ? $request->file('file_kartu_nisn')->store('file_kartu_nisn', 'public') : $currentPendaftaran->file_kartu_nisn;
        $fileKartuKipPath = $request->hasFile('file_kartu_kip') ? $request->file('file_kartu_kip')->store('file_kartu_kip', 'public') : $currentPendaftaran->file_kartu_kip;
        $fileKartuPkhPath = $request->hasFile('file_kartu_pkh') ? $request->file('file_kartu_pkh')->store('file_kartu_pkh', 'public') : $currentPendaftaran->file_kartu_pkh;
        $fileKartuKksPath = $request->hasFile('file_kartu_kks') ? $request->file('file_kartu_kks')->store('file_kartu_kks', 'public') : $currentPendaftaran->file_kartu_kks;
        $fileFotoRapotPath = $request->hasFile('file_foto_rapot') ? $request->file('file_foto_rapot')->store('file_foto_rapot', 'public') : $currentPendaftaran->file_foto_rapot;

        Pendaftaran::where('id', $id)->update([
            "no_registrasi" => $request->no_registrasi,
            "email_pendaftar" => $request->email_pendaftar,
            "nama_lengkap" => $request->nama_lengkap,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "jenis_kelamin" => $request->jenis_kelamin,
            "nisn" => $request->nisn,
            "nik" => $request->nik,
            "agama" => $request->agama,
            "hobi" => $request->hobi,
            "cita_cita" => $request->cita_cita,
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
            "status_ayah" => $request->status_ayah,
            "nik_ayah" => $request->nik_ayah,
            "pekerjaan_ayah" => $request->pekerjaan_ayah,
            "alamat_ayah" => $request->alamat_ayah,
            "nama_ibu_kandung" => $request->nama_ibu_kandung,
            "status_ibu" => $request->status_ibu,
            "nik_ibu" => $request->nik_ibu,
            "pekerjaan_ibu" => $request->pekerjaan_ibu,
            "alamat_ibu" => $request->alamat_ibu,
            "nama_wali" => $request->nama_wali,
            "nik_wali" => $request->nik_wali,
            "alamat_wali" => $request->alamat_wali,
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
        ]);

        return redirect('pendaftaran');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pendaftaran::destroy($id);
        return redirect('/pendaftaran');
    }

    // PendaftaranController.php
    public function belumTerverifikasi()
    {
        $pendaftaran = Pendaftaran::paginate(10);
        return view('pendaftaran.unverify', compact('pendaftaran'));
    }

    public function terverifikasi()
    {
        $pendaftaran = Pendaftaran::paginate(10);
        return view('pendaftaran.verify', compact('pendaftaran'));
    }

    public function verify($id)
    {
        $pendaftaran = Pendaftaran::find($id);

        if ($pendaftaran) {
            $verifiedByName = Auth::user()->name; // Assuming the user model has a 'name' attribute

            $pendaftaran->update([
                'verified' => true,
                'verified_by' => $verifiedByName,
            ]);

            return redirect()->back()->with('success', 'Verification successful.');
        }

        return redirect()->back()->with('error', 'Invalid request.');
    }

    public function export()
    {
        $timestamp = Carbon::now()->format('Ymd_His');
        $filename = 'pendaftaran_data_' . $timestamp . '.xlsx';

        return Excel::download(new PendaftaranExport, $filename);
    }
}
