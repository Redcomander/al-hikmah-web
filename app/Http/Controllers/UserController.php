<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function profil()
    {
        return view('profil');
    }
    public function upload()
    {
       $lokasi = request('foto_profil')->store('Avatars');
       User::where('id', request('id'))->update([
            'foto_profil' => $lokasi
       ]);
       return to_route('profil');
    }
}
