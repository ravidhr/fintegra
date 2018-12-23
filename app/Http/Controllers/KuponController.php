<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KuponController extends Controller {
  public function kupon_list(Request $request) {
    $data_kupon = DB::table('tbl_kupon')
    ->join('tbl_master_barang','tbl_kupon.id_barang','tbl_master_barang.id_barang')
    ->select('tbl_master_barang.nm_barang','tbl_kupon.*')
    ->paginate(5);
    if($request->ajax()) {
        return view('kupon_table', compact('data_kupon'),['start'=>$request->input('page')]);
      }
      return view('list_kupon', compact('data_kupon'),['start'=>1]);
  }

  public function delete_kupon($id) {
    DB::table('tbl_kupon')->where('id_kupon',$id)->delete();
    return redirect('kupon/list')->with('deleted',true);
  }

  public function add_kupon_show() {
    $barang = DB::table('tbl_master_barang')->get();
    return view('input_kupon',['barang'=>$barang]);
  }

  public function add_kupon_insert(Request $request) {
    $id_barang = $request->input('id_barang');
    $diskon = $request->input('diskon');
    $tgl_mulai_berlaku = $request->input('tgl_mulai_berlaku');
    $tgl_expired = $request->input('tgl_expired');
    DB::table('tbl_kupon')->insert([
      'id_barang'=>$id_barang,'diskon'=>$diskon,'tgl_mulai_berlaku'=>$tgl_mulai_berlaku,'tgl_expired'=>$tgl_expired
      ]
    );
    return redirect('kupon/add')->with('saved',true);
  }

  public function update_kupon_show($id) {
    $barang = DB::table('tbl_master_barang')->get();
    $kupon = DB::table('tbl_kupon')->where('id_kupon',$id)->first();
    if(!$kupon) {
      return 'Not found';
    }
    return view('update_kupon',['data_barang'=>$barang,'data_kupon'=>$kupon]);
  }

  public function update_kupon(Request $request, $id) {
    $id_kupon = $id;
    $id_barang = $request->input('id_barang');
    $diskon = $request->input('diskon');
    $tgl_mulai_berlaku = $request->input('tgl_mulai_berlaku');
    $tgl_expired = $request->input('tgl_expired');
    DB::table('tbl_kupon')
    ->where('id_kupon',$id_kupon)
    ->update(['id_barang'=>$id_barang,'diskon'=>$diskon,'tgl_mulai_berlaku'=>$tgl_mulai_berlaku,'tgl_expired'=>$tgl_expired]);
    return redirect('kupon/update/'.$id)->with('saved',true);
  }
}
