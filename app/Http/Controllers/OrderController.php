<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Customer;
use App\Model\Kendaraan;

class OrderController extends Controller
{
    public function order()
    {
        $orders = Order::all();
        $customers = Customer::all();
        $kendaraans = Kendaraan::all();

        return view('order', compact('orders', 'customers', 'kendaraans'));
    }
    public function order_store(Request $request)
    {
        $request->validate([
            'customer' => 'required|string',
            'kendaraan' => 'required|string',
            'jumlah_kendaraan' => 'required|integer|min:1',
        ]);

        $kendaraan = Kendaraan::findOrFail($request->input('kendaraan')); // Retrieve the kendaraan record

        $totalHarga = $kendaraan->harga * $request->input('jumlah_kendaraan');

        Order::create([
            'id_customer' => $request->input('customer'),
            'id_kendaraan' => $request->input('kendaraan'),
            'jumlah_kendaraan' => $request->input('jumlah_kendaraan'),
            // Add this line
            'total_harga' => $totalHarga,
        ]);

        return redirect()->route('order')->with('success', 'Order berhasil ditambahkan!');
    }

    public function order_update(Request $request, $id)
    {
        try {
            $id = $request->input('id');
            $customer = $request->input('customer');
            $kendaraanId = $request->input('kendaraan');
            $jumlah_kendaraan = $request->input('jumlah_kendaraan');
    
            $kendaraan = Kendaraan::findOrFail($kendaraanId);
            $totalHarga = $kendaraan->harga * $jumlah_kendaraan;
    
            $order = Order::findOrFail($id);
            $order->id_customer = $customer;
            $order->id_kendaraan = $kendaraanId;
            $order->jumlah_kendaraan = $jumlah_kendaraan;
            $order->total_harga = $totalHarga;
            
            $order->save();
    
            return redirect()->route('order')->with('success', 'Data order telah diubah!');
        } catch (\Exception $e) {
            return redirect()->route('order')->with('error', $e->getMessage());
        }    
    }

public function order_delete($id)
{
    $orderdelete = Order::find($id);
    $orderdelete->delete();
    return redirect()->back()->with("success", "Data order telah dihapus!");
}


}