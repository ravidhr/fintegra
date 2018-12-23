<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PenjualanController extends Controller {
  public function list_penjualan(Request $request) {
    $data_penjualan = DB::table('tbl_penjualan')
    ->join('tbl_master_barang','tbl_penjualan.id_barang','tbl_master_barang.id_barang')
    ->join('tbl_master_customer','tbl_penjualan.id_customer','tbl_master_customer.id_customer')
    ->select('tbl_penjualan.*','tbl_master_barang.nm_barang','tbl_master_barang.harga_jual','tbl_master_customer.nama_customer')
    ->paginate(5);
    if($request->ajax()) {
        return view('penjualan_table', compact('data_penjualan'),['start'=>$request->input('page')]);
      }
      return view('list_penjualan', compact('data_penjualan'),['start'=>1]);
  }

  public function delete_penjualan($id) {
    DB::table('tbl_penjualan')->where('id_penjualan',$id)->delete();
        return redirect('penjualan')->with('deleted',true);
  }

  public function penjualan_search(Request $request) {
    $cari = $request->input('cari');
    $data_penjualan = DB::table('tbl_penjualan')
    ->join('tbl_master_barang','tbl_penjualan.id_barang','tbl_master_barang.id_barang')
    ->join('tbl_master_customer','tbl_penjualan.id_customer','tbl_master_customer.id_customer')
    ->where('tbl_master_barang.nm_barang','like','%'.$cari.'%')
    ->select('tbl_penjualan.*','tbl_master_barang.nm_barang','tbl_master_barang.harga_jual','tbl_master_customer.nama_customer')
    ->paginate(5);
    if($request->ajax()) {
        return view('penjualan_table', compact('data_penjualan'),['start'=>$request->input('page')]);
      }
      return view('list_penjualan', compact('data_penjualan'),['start'=>1]);
  }
}
