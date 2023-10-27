<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Kartu;
use App\Models\Order;
use App\Models\KartuOrder;
use App\Models\HasilPengujian;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class PengujianController extends Controller
{
    public function index(Request $request)
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


        if ($request->ajax()) {
            return view('pengujians.ordertable', ['kartu_order' => $kartu_order])->render();
        }


        return view('pengujians.listpengujian', ['kartu_order' => $kartu_order]);
    }


    // {
    //   $kartu_order = KartuOrder::all();

    //   return view('pengujians.listpengujian', ['kartu_order' => $kartu_order]);
    // }

    public function getById($kartu_id, $kartuorder_id)
    {
        try {
            $kartu = Kartu::findOrFail($kartu_id);
            $kartuorder = KartuOrder::findOrFail($kartuorder_id);

            return view('pengujians.listorder', ['kartu' => $kartu], ['kartuorder' => $kartuorder]);
        } catch (ModelNotFoundException $exception) {

            return back()->with('error', 'Kartu not found!');
        }
    }

    // public function simpanHasilPengujian(Request $request, $id)
    // {
    //     // Validate your data
    //     $validatedData = $request->validate([
    //         'zero' => 'required|numeric',
    //         'minimum' => 'required|numeric',
    //         'bkd1' => 'required|numeric',
    //         'bkd2' => 'required|numeric',
    //         'bkd3' => 'required|numeric',
    //         'penunjukanzero' => 'required|numeric',
    //         'penunjukanminimum' => 'required|numeric',
    //         'penunjukanbkd1' => 'required|numeric',
    //         'penunjukanbkd2' => 'required|numeric',
    //         'penunjukanbkd3' => 'required|numeric',
    //     ]);

    //     $order = Order::findOrFail($id);

    //     $testResult = new HasilPengujian($validatedData);
    //     $order->testResult()->save($testResult);

    //     return redirect()->back()->with('success', 'Test results and standards saved successfully');
    // }

    public function uji($kartu_id, $kartuorder_id, $id)
    {
        try {
            $kartu = Kartu::findOrFail($kartu_id);
            $kartuorder = KartuOrder::findOrFail($kartuorder_id);
            $order = Order::findOrFail($id);

            $minimum_menimbang = $this->hitungMinimumMenimbang($order->kelas, $order->skala);
            $htgbkd1 = $this->hitungbkd1($order->kelas, $order->skala);
            $htgbkd2 = $this->hitungbkd2($order->kelas, $order->skala);
            $htgbkd3 = $this->hitungbkd3($order->kelas, $order->skala);
            $bkd1 = $this->finalbkd1($htgbkd1, $order->kapasitas);
            $bkd2 = $this->finalbkd2($htgbkd1, $htgbkd2, $order->kapasitas);
            $bkd3 = $this->finalbkd3($htgbkd2, $htgbkd3, $order->kapasitas);

            return view('pengujians.formuji', [
                'kartu' => $kartu,
                'kartuorder' => $kartuorder,
                'order' => $order,
                'minimum_menimbang' => $minimum_menimbang,
                'bkd1' => $bkd1,
                'bkd2' => $bkd2,
                'bkd3' => $bkd3
            ]);
        } catch (ModelNotFoundException $exception) {
            return back()->with('error', 'Kartu not found!');
        }
    }

    private function hitungMinimumMenimbang($kelas, $skala)
    {
        if ($kelas == 0) {
            return 0;
        } elseif ($kelas == "Kelas IIII") {
            return 10 * $skala;
        } elseif ($kelas == "Kelas III") {
            return 20 * $skala;
        } elseif ($kelas == "Kelas II") {
            if ($skala >= 0.1) {
                return 50 * $skala;
            } elseif ($skala >= 0.001) {
                return 20 * $skala;
            } elseif ($skala <= 0.05) {
                return 20 * $skala;
            }
        }
        return 0;
    }

    private function hitungbkd1($kelas, $skala)
    {
        if ($kelas == 0) {
            return 0;
        } elseif ($kelas == "Kelas IIII") {
            return $skala * 50;
        } elseif ($kelas == "Kelas III") {
            return $skala * 500;
        } elseif ($kelas == "Kelas II") {
            return $skala * 5000;
        } else {
            return 0;
        }
    }

    private function finalbkd1($htgbkd1, $kapasitas)
    {
        if ($htgbkd1 == 0) {
            return 0;
        } elseif ($htgbkd1 < $kapasitas) {
            return $htgbkd1;
        } elseif ($htgbkd1 == $kapasitas) {
            return $kapasitas;
        } else {
            return 0;
        }
    }

    private function hitungbkd2($kelas, $skala)
    {
        if ($kelas == 0) {
            return 0;
        } elseif ($kelas == "Kelas IIII") {
            return $skala * 200;
        } elseif ($kelas == "Kelas III") {
            return $skala * 2000;
        } elseif ($kelas == "Kelas II") {
            return $skala * 20000;
        } else {
            return 0;
        }
    }

    private function finalbkd2($htgbkd1, $htgbkd2, $kapasitas)
    {
        if ($htgbkd2 == 0) {
            return 0;
        } elseif ($htgbkd2 > $kapasitas) {
            return $kapasitas;
        } elseif ($htgbkd1 < $htgbkd2) {
            return $htgbkd2;
        } elseif ($htgbkd2 == $kapasitas) {
            return $kapasitas;
        } else {
            return 0;
        }
    }

    private function hitungbkd3($kelas, $skala)
    {
        if ($kelas == 0) {
            return 0;
        } elseif ($kelas == "Kelas IIII") {
            return $skala * 1000;
        } elseif ($kelas == "Kelas III") {
            return $skala * 10000;
        } elseif ($kelas == "Kelas II") {
            return $skala * 100000;
        } else {
            return 0;
        }
    }

    private function finalbkd3($htgbkd2, $htgbkd3, $kapasitas)
    {
        if ($htgbkd3 == 0) {
            return 0;
        } elseif ($htgbkd3 > $kapasitas) {
            return $kapasitas;
        } elseif ($htgbkd2 < $htgbkd3) {
            return $htgbkd3;
        } elseif ($htgbkd3 == $kapasitas) {
            return $kapasitas;
        } else {
            return 0;
        }
    }

    public function aksiPengujian(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'penunjukanzero' => 'required|numeric',
            'penunjukanminimum' => 'required|numeric',
            'penunjukanbkd1' => 'required|numeric',
            'penunjukanbkd2' => 'required|numeric',
            'penunjukanbkd3' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $inputs = $request->all();

        $order = Order::findOrFail($id);

        $hasilPengujian = $order->hasilPengujian ?: new HasilPengujian();

        $hasilPengujian->zero = $inputs['zero'];
        $hasilPengujian->minimum = $inputs['minimum'];
        $hasilPengujian->bkd1 = $inputs['bkd1'];
        $hasilPengujian->bkd2 = $inputs['bkd2'];
        $hasilPengujian->bkd3 = $inputs['bkd3'];
        $hasilPengujian->penunjukanzero = $inputs['penunjukanzero'];
        $hasilPengujian->penunjukanminimum = $inputs['penunjukanminimum'];
        $hasilPengujian->penunjukanbkd1 = $inputs['penunjukanbkd1'];
        $hasilPengujian->penunjukanbkd2 = $inputs['penunjukanbkd2'];
        $hasilPengujian->penunjukanbkd3 = $inputs['penunjukanbkd3'];

        if ($order->jenis_pengukuran === 'Tera') {
            if (
                $this->persenSelisih($inputs['penunjukanbkd3'], $inputs['bkd3'], 1.5) &&
                $this->persenSelisih($inputs['penunjukanbkd2'], $inputs['bkd2'], 1) &&
                $this->persenSelisih($inputs['penunjukanbkd1'], $inputs['bkd1'], 0.5) &&
                $this->persenSelisih($inputs['penunjukanminimum'], $inputs['minimum'], 0.5)
            ) {
                $order->status = 'lulus';
            } else {
                $order->status = 'gagal';
            }
        } elseif ($order->jenis_pengukuran === 'Tera Ulang') {
            if (
                $this->persenSelisih($inputs['penunjukanbkd3'], $inputs['bkd3'], 3) &&
                $this->persenSelisih($inputs['penunjukanbkd2'], $inputs['bkd2'], 2) &&
                $this->persenSelisih($inputs['penunjukanbkd1'], $inputs['bkd1'], 1) &&
                $this->persenSelisih($inputs['penunjukanminimum'], $inputs['minimum'], 1)
            ) {
                $order->status = 'lulus';
            } else {
                $order->status = 'gagal';
            }
        } else {
            // Optionally handle other cases for 'jenis_pengukuran'
            return redirect()->back()->with('error', 'Invalid jenis_pengukuran value.');
        }

        // Save the order's status (lulus or gagal)
        $order->save();

        // Associate and save the test result with the order
        $order->hasilPengujian()->save($hasilPengujian);

        // Redirect back with the outcome message
        if ($order->status === 'lulus') {
            return redirect()->back()->with('success', 'Alat UTTP Lulus Uji');
        } else {
            return redirect()->back()->with('error', 'Alat UTTP Gagal Uji.');
        }
    }

    private function persenSelisih($penunjukanValue, $referenceValue, $allowedPercentageDifference)
    {
        // Compute the absolute difference as a percentage of the reference value
        $difference = abs($referenceValue - $penunjukanValue);
        $percentageDifference = ($difference / $referenceValue) * 100;

        // Check if the percentage difference is within the allowed range
        return $percentageDifference <= $allowedPercentageDifference;
    }
}
