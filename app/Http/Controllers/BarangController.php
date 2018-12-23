<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BarangController extends Controller {

  public function list_post(Request $request) {
    $cari = $request->input('cari');
    $data_barang = DB::table('tbl_master_barang')
    ->join('tbl_kategori_barang','tbl_master_barang.kategori_id','tbl_kategori_barang.kategori_id')
    ->join('tbl_master_supplier','tbl_master_barang.id_supplier','tbl_master_supplier.id_supplier')
    ->select('tbl_master_barang.*','tbl_kategori_barang.nama_kategori','tbl_master_supplier.nama_supplier')
    ->where('tbl_master_barang.nm_barang','like','%'.$cari.'%')
    ->paginate(5);
    if($request->ajax()) {
        return view('barang_table', compact('data_barang'),['start'=>$request->input('page')]);
      }
      return view('list_barang', compact('data_barang'),['start'=>1]);
  }

  public function list_barang(Request $request) {
    $data_barang = DB::table('tbl_master_barang')
    ->join('tbl_kategori_barang','tbl_master_barang.kategori_id','tbl_kategori_barang.kategori_id')
    ->join('tbl_master_supplier','tbl_master_barang.id_supplier','tbl_master_supplier.id_supplier')
    ->select('tbl_master_barang.*','tbl_kategori_barang.nama_kategori','tbl_master_supplier.nama_supplier')
    ->paginate(5);
    if($request->ajax()) {
        return view('barang_table', compact('data_barang'),['start'=>$request->input('page')]);
      }
      return view('list_barang', compact('data_barang'),['start'=>1]);
  }

  public function delete_barang($id) {
    DB::table('tbl_master_barang')->where('id_barang',$id)->delete();
    return redirect('barang/list')->with('deleted',true);
  }

  public function update_barang_show($id) {
    $kategori_barang = DB::table('tbl_kategori_barang')->get();
    $barang = DB::table('tbl_master_barang')->where('id_barang',$id)->first();
    $supplier_barang = DB::table('tbl_master_supplier')->get();
    if(!$barang) {
      return 'Not Found';
    }
    return view('update_barang',['kategori_barang'=>$kategori_barang,'barang'=>$barang,'supplier_barang'=>$supplier_barang]);
  }

  public function update_barang(Request $request, $id) {
    $id_barang = $id;
    $kategori_id = $request->input('kategori_id');
    $nm_barang = $request->input('nm_barang');
    $stok_barang = $request->input('stok_barang');
    $harga_beli = $request->input('harga_beli');
    $harga_jual = $request->input('harga_jual');
    $id_supplier = $request->input('id_supplier');

    DB::table('tbl_master_barang')
    ->where('id_barang',$id_barang)
    ->update(['kategori_id'=>$kategori_id,'nm_barang'=>$nm_barang,'stok_barang'=>$stok_barang,'harga_beli'=>$harga_beli,'harga_jual'=>$harga_jual,'id_supplier'=>$id_supplier]);
    return redirect('barang/update/'.$id)->with('updated',true);
  }

  public function add_barang_show() {
    $kategori_barang = DB::table('tbl_kategori_barang')->get();
    $supplier_barang = DB::table('tbl_master_supplier')->get();
    return view('input_barang',['kategori_barang'=>$kategori_barang,'supplier_barang'=>$supplier_barang]);
  }

  public function add_barang_insert(Request $request) {
    $kategori_id = $request->input('kategori_id');
    $nm_barang = $request->input('nm_barang');
    $stok_barang = $request->input('stok_barang');
    $harga_beli = $request->input('harga_beli');
    $harga_jual = $request->input('harga_jual');
    $id_supplier = $request->input('id_supplier');
    DB::table('tbl_master_barang')->insert([
      ['kategori_id'=>$kategori_id,'nm_barang'=>$nm_barang,'stok_barang'=>$stok_barang,'harga_beli'=>$harga_beli,'harga_jual'=>$harga_jual,'id_supplier'=>$id_supplier]
    ]);
    return redirect('barang/add')->with('inserted',true);
  }
}
?>
