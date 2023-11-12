<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\Controller;
use App\Model\Customer;


class CustomerController extends Controller
{

    public function customer()
    {
        $customers = Customer::all();

        return view('customer', compact('customers'));
    }

    public function customer_store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'noTelp' => 'required|string',
            'IDcard' => 'required|numeric',
        ]);

        Customer::create([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'notelp' => $request->input('noTelp'),
            'IDcard' => $request->input('IDcard'),
        ]);

        return redirect()->route('customer')->with('success', 'Data customer berhasil ditambahkan!');
    }


    public function customer_update(Request $request)
    {
        try {
        $id = $request->input('id');
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $notelp = $request->input('notelp');
        $IDcard = $request->input('IDcard');


        $cust = Customer::findOrFail($id);
        $cust->nama = $nama;
        $cust->alamat = $alamat;
        $cust->notelp = $notelp;
        $cust->IDcard = $IDcard;
        $cust->save();

        return redirect()->route('customer')->with('success', '"Data customer telah diubah!');
        } catch (\Exception $e) {
            return redirect()->route('customer')->with('error', $e->getMessage());
        }
    }


    public function customer_delete($id)
    {
        $custdelete = Customer::find($id);
        $custdelete->delete();
        return redirect()->back()->with("success", "Data customer telah dihapus!");
    }





}