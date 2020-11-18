<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Barcode;
use PDF;

// use DB;

class BarcodeController extends Controller
{
   

    public function barcode() {
        $barang = Barcode::get(); 
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();

        // $barang = DB::table('barang')->get();
        // return response()->json([
        //     "message" => "Data barang berhasil di tampilkan"
        // ], 200);
      
        return view('barcode/barcode')->with(compact('barang'));

    }   
    

    // public function printBarcode(){ 
    //     $barang = Barcode::limit(12)->get(); 
    //     $pdf =  PDF::loadView ('barcode/barcode_pdf',['barang'=>$barang]); 
    //     $pdf->setPaper('a4', 'potrait'); 
    //     return $pdf->stream('barcode_pdf'); 
    public function insert(Request $request) {
        DB::table('barang')->insert([
            'nama' => $request->nama
        ]);

        return response()->json([
            "message" => "Data barang berhasil di tambahkan"
        ], 201);
        //return redirect('/Barang/Barcode');
    }

    public function edit(Request $request, $id){
        DB::table('barang')->where("ID_BARANG", $request->id)->update([
            'Nama' => $request ->nama
        ]);
    }

    public function scannerBarcode(){
        return view('barcode/barcode_scanner');
    }

    public  function printBarcode(){ 
        $barang =  Barcode::limit(40)->get(); 
        $no = 1; 
        $paper_width = 793.7007874; // 38 mm
        $paper_height = 623.62204724; // 18 mm
        $paper_size = array(0, 0, $paper_width, $paper_height);
        $pdf =  PDF::loadView  ('barcode/barcode_pdf',  compact('barang', 'no')); 
        $pdf->setPaper("f4"); 
        return $pdf->stream(); 
    }
     public  function printBarcodeId($id){ 
        $barang = DB::table('barang',$id)->get();
        $no = 1; 
        $br=$id; 
        $paper_width = 793.7007874; // 38 mm
        $paper_height = 623.62204724; // 18 mm
        $paper_size = array(0, 0, $paper_width, $paper_height);
        $pdf =  PDF::loadView  ('barcode/printBarcode_id',['id'=>$br],  compact('barang', 'no')); 
        $pdf->setPaper('letter'); 
        return $pdf->stream(); 
    }
    public function alert($id){
        $barang = DB::table('barang')->where('ID_BARANG',$id)->get();
        return json_encode($barang);
    }

    public function store(Request $request){
        $date= date('mdy');
        $d = $date.'%';
        $id = (DB::table('barang')->where('ID_BARANG','like',$d)->count('ID_BARANG'))+1;
        $id_barang = $date.str_pad($id++,2,"0",STR_PAD_LEFT);
        DB::table('barang')->insert([
            'id_barang' => $id_barang,
            'nama' => $request->nama
        ]);
       
        return redirect('barcodebarcode');
    }
   

}
