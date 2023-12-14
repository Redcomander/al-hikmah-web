<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = student::paginate(10);
        return view('student.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request to ensure the file is present and is an image (you may add more specific validation rules)
        $request->validate([
            'gambar_santri' => 'required|image', // Adjust validation rules as needed
        ]);

        // Handle file upload if you have a file input (e.g., 'gambar_santri')
        if ($request->hasFile('gambar_santri')) {
            // Store the uploaded file and get its path
            $gambar_santriPath = $request->file('gambar_santri')->store('santri_images', 'public');
        } else {
            $gambar_santriPath = null;
        }

        // Create the article with the stored file path and status
        student::create([
            "nomor" => $request->nomor,
            "no_induk" => $request->no_induk,
            "gambar_santri" => $gambar_santriPath,
            "nama_lengkap" => $request->nama_lengkap,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "jenis_kelamin" => $request->jenis_kelamin,
            "alamat" => $request->alamat,
            "nisn" => $request->nisn,
            "nama_wali" => $request->nama_wali,
        ]);

        return redirect('student');
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
    public function edit(student $student)
    {
        // dd($student);
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Check if a new file has been uploaded
        if ($request->hasFile('gambar_santri')) {
            // Store the new uploaded file in the public storage directory
            $gambar_santriPath = $request->file('gambar_santri')->store('santri_images', 'public');
        } else {
            // No new file uploaded, keep the existing value
            $gambar_santriPath = $request->input('current_gambar_santri');
        }

        // Create the article with the stored file path and status
        student::where('id', $id)->update([
            "no_induk" => $request->no_induk,
            "gambar_santri" => $gambar_santriPath,
            "nama_lengkap" => $request->nama_lengkap,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "jenis_kelamin" => $request->jenis_kelamin,
            "alamat" => $request->alamat,
            "nisn" => $request->nisn,
            "nama_wali" => $request->nama_wali,
        ]);

        return redirect('student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    { {
            student::destroy($id);
            return redirect('/student');
        }
    }
}
