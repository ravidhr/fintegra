<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller {
  public function home() {
    $customer = DB::table('tbl_master_customer')->count();
    $penjualan = DB::table('tbl_penjualan')->count();
    $barang = DB::table('tbl_master_barang')->count();
    $kupon = DB::table('tbl_kupon')->count();
    return view('dashboard',['customer'=>$customer,'penjualan'=>$penjualan,'barang'=>$barang,'kupon'=>$kupon]);
  }
}
