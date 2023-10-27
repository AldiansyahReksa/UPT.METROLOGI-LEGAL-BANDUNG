<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Kartu;
use App\Models\Order;
use App\Models\KartuOrder;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{

    public function insertWithModel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kartu_id' => 'required|exists:kartus,id',
            'jenis_alat_uttp' => 'required',
            'merek' => 'required',
            'tipe_atau_model' => 'required',
            'nomor_seri' => 'required',
            'kapasitas' => 'required|numeric',
            'skala' => 'required|numeric',
            'jenis_pengukuran' => 'required',
            'jumlah_at' => 'nullable',
            'keterangan' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Calculate the "kelas" field based on kapasitas and skala
        $kapasitas = $request->input('kapasitas');
        $skala = $request->input('skala');
        $totalKapasitas = $kapasitas / $skala;

        if ($totalKapasitas >= 10000) {
            $kelas = 'Kelas II';
        } else if ($totalKapasitas >= 1000) {
            $kelas = 'Kelas III';
        } else {
            $kelas = 'Kelas IIII';
        }

        $kartu_id = $request->input('kartu_id');
        $kartu_order_id = $request->input('kartu_order_id');
        $lastOrderNumber = Order::where('kartu_order_id', $kartu_order_id)->max('order_number');
        $newOrderNumber = $lastOrderNumber ? $lastOrderNumber + 1 : 1;


        $order = new Order();

        $order->kartu_order_id = $request->input('kartu_order_id');
        $order->order_number = $newOrderNumber;
        $order->jenis_alat_uttp = $request->input('jenis_alat_uttp');
        $order->merek = $request->input('merek');
        $order->tipe_atau_model = $request->input('tipe_atau_model');
        $order->nomor_seri = $request->input('nomor_seri');
        $order->kapasitas = $kapasitas;
        $order->skala = $skala;
        $order->hasil_skala = $kapasitas / $skala;
        $order->kelas = $kelas;
        $order->jenis_pengukuran = $request->input('jenis_pengukuran');
        $order->jumlah_at = $request->input('jumlah_at');
        $order->keterangan = $request->input('keterangan');
        $order->save();


        return redirect('/kartuorder/' . $kartu_id . '/' . $order->kartu_order_id)->with('success', 'Data created!');
    }


    public function getById($id)
    {
        try {
            $order = Order::with('kartu')->findOrFail($id);
            return view('orders.orderdetail', ['order' => $order]);
        } catch (ModelNotFoundException $exception) {
            // If order with the given ID is not found, handle the error
            return back()->with('error', 'Order not found!');
        }
    }


    public function formInsert($kartu_id, $kartuorder_id)
    {
        $kartu = Kartu::findOrFail($kartu_id);
        $kartuorder = KartuOrder::findOrFail($kartuorder_id);

        return view('orders.createorder', ['kartu' => $kartu], ['kartuorder' => $kartuorder]);
    }

    public function getOrdersByKartu($kartuId)
    {
        $kartu = Kartu::findOrFail($kartuId);

        $orders = $kartu->orders;

        return view('orders.index', ['orders' => $orders]);
    }

    public function cetak_pdf($kartu_id, $kartuorder_id, $id)
    {
        $kartu = Kartu::find($kartu_id);
        $kartuorder = KartuOrder::find($kartuorder_id);
        $order = Order::find($id);
        $hasilpengujian = $order->hasilPengujian;

        $kelas = $order->kelas;
        if ($order->kelas == 'Kelas II') {
            $kelas = 'M1';
        } elseif ($order->kelas == 'Kelas III' || $order->kelas == 'Kelas IIII') {
            $kelas = 'M2';
        }

        $pdf = PDF::loadview('orders/detail_pdf', [
            'order' => $order,
            'kartu' => $kartu,
            'kartuorder' => $kartuorder,
            'kelas' => $kelas,
            'hasilpengujian' => $hasilpengujian
        ]);
        $pdf->setPaper('legal', 'potrait');

        $newkartuorder = str_pad($kartuorder_id, 5, '0', STR_PAD_LEFT);
        $fileName = 'SKHP ' . $newkartuorder . '.' . $order->order_number . '.pdf';

        return $pdf->download($fileName);
    }
}
