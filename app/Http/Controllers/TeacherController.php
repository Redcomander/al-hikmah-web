<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::paginate(10);
        // $this->authorize('view', teacher::class);
        return view('teacher.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request to ensure the file is present and is an image (you may add more specific validation rules)
        $request->validate([
            'foto_guru' => 'required|image',
            'email' => ['required', 'email', Rule::unique('users', 'email') ]
        ]);

        // Handle file upload if you have a file input (e.g., 'gambar_santri')
        if ($request->hasFile('foto_guru')) {
            // Store the uploaded file and get its path
            $gambar_guruPath = $request->file('foto_guru')->store('guru_images', 'public');
        } else {
            $gambar_guruPath = null;
        }


        // Create the article with the stored file path and status
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "foto_guru" => $gambar_guruPath,
            "wali_kelas" => $request->wali_kelas,
            "status" => $request->status,
            "grade_1" => $request->grade_1,
            "grade_2" => $request->grade_2,
            "grade_3" => $request->grade_3,
        ]);


        return redirect('teacher');
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
    public function edit($id)
    {
        $user = User::findOrFail($id);
        // dd($user);
        return view('teacher.edit', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Check if a new file has been uploaded
        if ($request->hasFile('foto_guru')) {
            // Store the new uploaded file in the public storage directory
            $gambar_guruPath = $request->file('foto_guru')->store('guru_images', 'public');
        } else {
            // No new file uploaded, keep the existing value
            $gambar_guruPath = $request->input('current_foto_guru');
        }

        // Create the article with the stored file path and status
        User::where('id', $id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "foto_guru" => $gambar_guruPath,
            "wali_kelas" => $request->wali_kelas,
            "status" => $request->status,
            "grade_1" => $request->grade_1,
            "grade_2" => $request->grade_2,
            "grade_3" => $request->grade_3,
        ]);


        return redirect('teacher');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/teacher');
    }
}
