<?php

namespace App\Http\Controllers;

use App\Models\Kartu;
use App\Models\Order;
use App\Models\KartuOrder;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class KartuOrderController extends Controller
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
            'skala' => 'required|numeric|gt:0', // Add the validation for "skala" field
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

        $kartu_order = new KartuOrder();

        $kartu_order->kartu_id = $request->input('kartu_id');

        $kartu_order->save();


        $order = new Order();

        $order->kartu_order_id = $kartu_order->id;
        $order->order_number = 1;
        $order->jenis_alat_uttp = $request->input('jenis_alat_uttp');
        $order->merek = $request->input('merek');
        $order->tipe_atau_model = $request->input('tipe_atau_model');
        $order->nomor_seri = $request->input('nomor_seri');
        $order->kapasitas = $kapasitas;
        $order->skala = $skala;
        $order->hasil_skala = $kapasitas / $skala; // Set the "hasil_skala" field
        $order->kelas = $kelas; // Set the "kelas" field based on calculation
        $order->jenis_pengukuran = $request->input('jenis_pengukuran');
        $order->jumlah_at = $request->input('jumlah_at');
        $order->keterangan = $request->input('keterangan');
        $order->save();

        return redirect('/kartu/' . $kartu_order->kartu_id)->with('success', 'Data created!');
    }


    public function getById($kartu_id, $kartuorder_id)
    {
        try {
            $kartu = Kartu::findOrFail($kartu_id);
            $kartuorder = KartuOrder::findOrFail($kartuorder_id);

            return view('kartuorders.kartuorderdetail', ['kartu' => $kartu], ['kartuorder' => $kartuorder]);
        } catch (ModelNotFoundException $exception) {
            // If kartu with the given ID is not found, handle the error
            return back()->with('error', 'Kartu not found!');
        }
    }

    public function formInsert($kartu_id = null)
    {
        $kartu = null;

        if ($kartu_id) {
            // Find the kartu with the given ID
            $kartu = Kartu::find($kartu_id);
        }

        return view('kartuorders.createkartuorder', compact('kartu'));
    }

    public function find(Request $request)
    {
        $search = $request->get('search');
        $numericSearch = intval($search);
        if ($search) {
            $kartu_order = KartuOrder::where('id', $numericSearch)
                ->orWhereHas('kartu', function ($query) use ($search) {
                    $query->where('pemilik_uttp', 'like', "%{$search}%");
                })
                ->get();
        } else {
            $kartu_order = KartuOrder::all();
        }

        // If AJAX request, return only the table
        if ($request->ajax()) {
            return view('orders.ordertable', ['kartu_order' => $kartu_order])->render();
        }

        // Otherwise, return the full view
        return view('orders.find', ['kartu_order' => $kartu_order]);
    }

    public function cetak_kartuorder($kartu_id, $kartuorder_id)
    {
        $kartu = Kartu::find($kartu_id);
        $kartuorder = KartuOrder::find($kartuorder_id);

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->loadView('kartuorders.kartuorder_pdf', [
                'kartu' => $kartu,
                'kartuorder' => $kartuorder,
            ]);

        $pdf->getDomPDF()->getOptions()->set('fontDir', public_path('fonts'));
        $pdf->getDomPDF()->getOptions()->set('defaultFont', 'DejaVuSans');
        $pdf->getDomPDF()->getOptions()->set('fontCache', public_path('fonts'));

        $pdf->setPaper('legal', 'landscape');

        $newkartuorder = str_pad($kartuorder_id, 5, '0', STR_PAD_LEFT);
        $fileName = 'Kartu Order ' . $newkartuorder . '.pdf';

        return $pdf->download($fileName);
    }
}
