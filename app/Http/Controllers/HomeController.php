<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $parsing['countLokasi'] = Lokasi::all()->count();
        return view('home', $parsing);
    }

    public function profil()
    {
        $parsing['user'] = Auth::user();
        return view('auth.profil', $parsing);
    }

    public function changeProfil(Request $request, $id)
    {
        // validation
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
        ]);

        // run query
        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // redirect
        return redirect('/profil')->with('success', 'Data Profil anda berhasil dirubah');
    }

    public function password()
    {
        $parsing['user'] = Auth::user();
        return view('auth.password', $parsing);
    }

    public function changePassword(Request $request, $id)
    {
        // validation
        $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        // run query
        $user = User::find($id)->update([
            'password' => Hash::make($request->password),
        ]);

        // redirect
        if ($user) {
            return redirect('/password-change')->with('success', 'Password untuk Profil anda berhasil dirubah');
        }
    }
}
