<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Kartu;
use App\Models\Order;
use App\Models\KartuOrder;
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
                ->orWhereHas('kartu', function($query) use ($search) {
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

  public function getById($kartu_id,$kartuorder_id)
  {
      try {
        $kartu = Kartu::findOrFail($kartu_id);
        $kartuorder = KartuOrder::findOrFail($kartuorder_id);

          return view('pengujians.listorder', ['kartu' => $kartu], ['kartuorder' => $kartuorder]);
      } catch (ModelNotFoundException $exception) {

          return back()->with('error', 'Kartu not found!');
      }
  }

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

public function aksiPengujian(Request $request)
{   
    //dd($request->all());
        $bkd3 = $request->input('bkd3');
        $penunjukanbkd3 = $request->input('penunjukanbkd3');
        
        $bkd2 = $request->input('bkd2');
        $penunjukanbkd2 = $request->input('penunjukanbkd2');
        
        $bkd1 = $request->input('bkd1');
        $penunjukanbkd1 = $request->input('penunjukanbkd1');
        
        $minimum = $request->input('minimum');
        $penunjukanminimum = $request->input('penunjukanminimum');
        
        // $zero = $request->input('zero');
        // $penunjukanzero = $request->input('penunjukanzero');

        if (
            $this->persenSelisih($penunjukanbkd3, $bkd3, 1.5) &&
            $this->persenSelisih($penunjukanbkd2, $bkd2, 1) &&
            $this->persenSelisih($penunjukanbkd1, $bkd1, 0.5) &&
            $this->persenSelisih($penunjukanminimum, $minimum, 0.5)
            // $this->persenSelisih($penunjukanzero, $zero, 0.5)
        ) {
            return redirect()->back()->with('success', 'Alat UTTP Lolos Uji');
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
