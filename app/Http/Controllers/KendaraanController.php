<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\Controller;
use App\Model\Kendaraan;

class KendaraanController extends Controller
{
  

    public function kendaraan()
    {
    $mobel = Kendaraan::where('jenis', 'Mobil')->get();
    $moter = Kendaraan::where('jenis', 'Motor')->get();
    $trek = Kendaraan::where('jenis', 'Truk')->get();

    return view('kendaraan', compact('mobel', 'moter', 'trek'));
    }

    public function kendaraan_store(Request $request)
    {
        $request->validate([
            'nama'=> 'required|string',
            'jenis' => 'required|string',
            'model' => 'required|string',
            'tahun' => 'required|integer',
            'jumlah_penumpang' => 'required|integer',
            'manufaktur' => 'required|string',
            'harga' => 'required|integer',
            'bahan_bakar' => 'nullable|string',
            'luas_bagasi' => 'nullable|integer',
            'jumlah_roda' => 'nullable|integer',
            'luas_kargo' => 'nullable|integer',
            'ukuran_bagasi' => 'nullable|integer',
            'kapasitas_bensin' => 'nullable|integer',
        ]);

        Kendaraan::create([
        'nama' => $request->input('nama'),
        'jenis' => $request->input('jenis'),
        'model' => $request->input('model'),
        'tahun' => $request->input('tahun'),
        'jumlah_penumpang' => $request->input('jumlah_penumpang'),
        'manufaktur' => $request->input('manufaktur'),
        'harga' => $request->input('harga'),
        'bahan_bakar' => $request->input('bahan_bakar'),
        'luas_bagasi' => $request->input('luas_bagasi'),
        'jumlah_roda' => $request->input('jumlah_roda'),
        'luas_kargo' => $request->input('luas_kargo'),
        'ukuran_bagasi' => $request->input('ukuran_bagasi'),
        'kapasitas_bensin' => $request->input('kapasitas_bensin'),
        ]);

        return redirect()->route('kendaraan')->with('success', 'Data customer berhasil ditambahkan!');
    }
    public function kendaraan_update(Request $request)
    {
      
        $id = $request->input('id');
        $nama = $request->input('nama');
        $model = $request->input('model');
        $tahun = $request->input('tahun');
        $jumlah_penumpang = $request->input('jumlah_penumpang');
        $manufaktur = $request->input('manufaktur');
        $harga = $request->input('harga');

        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->nama = $nama;
        $kendaraan->model = $model;
        $kendaraan->tahun = $tahun;
        $kendaraan->jumlah_penumpang = $jumlah_penumpang;
        $kendaraan->manufaktur = $manufaktur;
        $kendaraan->harga = $harga;
    
        if ($kendaraan->jenis === 'Mobil') {
            $kendaraan->bahan_bakar = $request->bahan_bakar;
            $kendaraan->luas_bagasi = $request->luas_bagasi;
        } elseif ($kendaraan->jenis === 'Motor') {
            $kendaraan->ukuran_bagasi = $request->ukuran_bagasi;
            $kendaraan->kapasitas_bensin = $request->kapasitas_bensin;
        } elseif ($kendaraan->jenis === 'Truk') {
            $kendaraan->jumlah_roda = $request->jumlah_roda;
            $kendaraan->luas_kargo = $request->luas_kargo;
        }
    
        $kendaraan->save();
    
        return redirect()->route('kendaraan')->with('success', 'Data kendaraan berhasil diupdate!');
    }

    public function kendaraan_delete($id)
    {
        $kendaraandelete = Kendaraan::find($id);
        $kendaraandelete->delete();
        return redirect()->back()->with("success", "Data customer telah dihapus!");
    }

    
}