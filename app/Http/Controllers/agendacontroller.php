<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\agenda;

class agendacontroller extends Controller
{
    //
 //
	public function lihatagenda(){
		$upload = agenda::all();
        return response()->json([
            'pesan' =>'sukses lah',
            'upload' => $upload
        ],200);
		// $gambar = upload::get();
		// return view('upload',['gambar' => $gambar]);
	}
 
	public function tambahagenda(Request $request){

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->input('file');
		$nama_file = time()."_".".mp4";
		// $tujuan_upload = '../resource/gambar/';
			$tujuan_upload = 'agenda/';

 if (file_put_contents($tujuan_upload . $nama_file , base64_decode($file))) {
        // code...
        $response['code'] =1;
        $response['msg'] ="Sukses";
        echo "Sukses Photo" . $response['msg'];
      } else {
        // code...
        $response['code'] =0;
        $response['msg'] ="error";
      }

		agenda::create([
			'file' => $nama_file,
			'nama_agenda' => $request->input('nama_agenda'),
			'keterangan'=> $request->input('keterangan'),
		]);


  return response()->json(['code']);
		 // return redirect()->back();

	}


}
