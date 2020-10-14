<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LokasiController extends Controller
{
    public function index()
    {
        $parsing['lokasis'] = Lokasi::latest()->get();
        return view('lokasi.index', $parsing);
    }

    public function create()
    {
        return view('lokasi.create');
    }

    public function store(Request $request)
    {
        // validation
        $request->validate([
            'nama' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        // run query
        Lokasi::create([
            'id_lks'  => Str::uuid(),
            'nm_lks'  => Str::upper($request->nama),
            'lat_lks' => $request->latitude,
            'lng_lks' => $request->longitude,
        ]);

        // redirect
        return redirect('/lokasi')->with('success', 'Data Lokasi berhasil ditambahkan');
    }

    public function show($id)
    {
        $parsing['lokasi'] = Lokasi::find($id);
        return view('lokasi.show', $parsing);
    }

    public function edit($id)
    {
        $parsing['lokasi'] = Lokasi::find($id);
        return view('lokasi.edit', $parsing);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        // run query
        Lokasi::find($id)->update([
            'nm_lks'  => Str::upper($request->nama),
            'lat_lks' => $request->latitude,
            'lng_lks' => $request->longitude,
        ]);

        // redirect
        return redirect('/lokasi')->with('info', 'Data Lokasi berhasil diubah');
    }

    public function destroy($id)
    {
        // run query
        Lokasi::find($id)->delete();

        // redirect
        return redirect('/lokasi')->with('warning', 'Data Lokasi berhasil dihapus');
    }

    public function allMaps()
    {
        $str = '';
        $lokasis    = Lokasi::all();
        foreach ($lokasis as $lks) {
            $str .= '["' . $lks->nm_lks . '", ' . $lks->lat_lks . ', ' . $lks->lng_lks . '],';
        }

        $parsing['lokasi'] = $str;
        $parsing['countLokasi'] = Lokasi::all()->count();
        return view('lokasi.maps', $parsing);
    }
}
