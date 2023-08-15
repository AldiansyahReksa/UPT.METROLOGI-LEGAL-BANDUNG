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
      if ($search) {
          $kartu_order = KartuOrder::where('id', 'like', "%{$search}%")
                          ->orWhereHas('kartu', function($query) use ($search) {
                              $query->where('pemilik_uttp', 'like', "%{$search}%");
                          })
                          ->get();
      } else {
          $kartu_order = KartuOrder::all();
      }
  
      // If AJAX request, return only the table
      if ($request->ajax()) {
          return view('pengujians.ordertable', ['kartu_order' => $kartu_order])->render();
      }
  
      // Otherwise, return the full view
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
          // If kartu with the given ID is not found, handle the error
          return back()->with('error', 'Kartu not found!');
      }
  }
}
