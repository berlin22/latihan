<?php

namespace App\Http\Controllers;

// use App\User;
// use App\Http\Controllers\Controller;
// use DB;
use Session;
use Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Crypt;

class mahasiswacontroller extends Controller
{
    public function  index()
    {
        $mahasiswa = DB::table('mahasiswa')->get();
        // dd($mahasiswa);
        $result['mahasiswa'] = $mahasiswa;
        return view('mahasiswa',$result);
    }
    public function tambah()
    {
        return view('mahasiswaform');

    }
    public function simpan()
    {
        // $simpan['create'] = date('y-m-d h:i:s');
        $simpan['nim'] = Request::input('nim');
        $simpan['nama'] = Request::input('nama');
        $action=DB::table('mahasiswa')->insert($simpan);
        if ($action) {
            return redirect('/')->with(['message'=>'data berhasil di simpan']);
        } 
            else {
            return redirect('/')->back()->with(['message'=>'gagal']);
        }
    }
    public function hapus($id)
    {

        $id_decrypt = crypt::decrypt($id);
        // return $id_decrypt;

         $action = DB::table('mahasiswa')
         ->where('id',$id_decrypt)
         ->delete();
         if($action){
             $msg['message'] = 'Data berhasil dihapus';
             return redirect()->back()->with($msg);
         }
    }
     public function edit($id)
    {

        
         $mahasiswa = DB::table('mahasiswa')
         ->where('id',$id)
         ->first();
         if(empty($mahasiswa)){
             $msg['message'] = 'Data tidak ditemukan';
             return redirect()->with($msg);
         }else{

              $result['mahasiswa'] = $mahasiswa;
              return view('mahasiswaedit',$result);
         }
    }
    public function update($id)
    {
        $id_decrypt = crypt::decrypt($id);
        // return $id_decrypt;

        $simpan['nim'] = Request::input('nim');
        $simpan['nama'] = Request::input('nama');
        $action=DB::table('mahasiswa')->where('id',$id_decrypt)->update($simpan);
        if ($action) {
            return redirect('/')->with(['message'=>'data berhasil di simpan']);
        } 
            else {
            return redirect('/')->back()->with(['message'=>'gagal']);
        }
    }
}