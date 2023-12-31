<?php

namespace App\Http\Controllers;

use App\Models\Kartu;
use App\Models\Order;
use App\Models\KartuOrder;

use DateTime;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class KartuController extends Controller
{

  public function index()
  {
    $kartus = Kartu::all();

    return view('kartus.index', ['kartus' => $kartus]);
  }

  public function insertWithModel(Request $request)
  {
    $request->validate([
      'pemilik_uttp' => 'required',
      'alamat' => 'required',
      'nomor_telepon' => 'required',
      'kelurahan' => 'required',
      'kecamatan' => 'required',
    ]);

    $kartu = new Kartu();
    $kartu->pemilik_uttp = $request->input('pemilik_uttp');
    $kartu->alamat = $request->input('alamat');
    $kartu->nomor_telepon = $request->input('nomor_telepon');
    $kartu->kelurahan = $request->input('kelurahan');
    $kartu->kecamatan = $request->input('kecamatan');

    $kartu->save();

    return redirect('/kartu/form')->with('success', 'Data created!');
  }

  public function getById($id)
  {
      try {
          $kartu = Kartu::findOrFail($id);

          return view('kartus.kartudetail', ['kartu' => $kartu]);
      } catch (ModelNotFoundException $exception) {
          // If kartu with the given ID is not found, handle the error
          return back()->with('error', 'Kartu not found!');
      }
  }

  public function find(Request $request)
  {
      $searchQuery = $request->input('search_query');
  
      if ($searchQuery) {
          $kartus = Kartu::where('pemilik_uttp', 'LIKE', '%' . $searchQuery . '%')->get();
      } else {
          $kartus = Order::all();
      }
  
      return view('kartus.find', compact('kartus'));
  }
  
  

  public function formInsert()
  {

    return view('kartus.createkartu');
  }

  public function delete($id)
  {
      try {
          $kartu = Kartu::findOrFail($id);

          // Delete associated kartu_orders records
          $kartu->kartuOrders()->delete();
  
          // Now delete the kartus record
          $kartu->delete();
  
          return redirect('/index')->with('success', 'Data deleted successfully');
      } catch (ModelNotFoundException $exception) {
          return back()->with('error', 'Kartu not found');
      }
  }
  
}
