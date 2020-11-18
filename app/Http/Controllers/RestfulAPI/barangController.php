<?php

namespace App\Http\Controllers\RestfulAPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barang;

class barangController extends Controller
{
    //

    public function getBarang(){
        $barang = barang::all();
        return response()->json([
            "message" => "tampil data barang"
        ], 201);
    }

    public function createBarang(Request $request){
        $barang = new barang;
        $barang->ID_Barang= $request->ID_Barang;
        $barang->Nama = $request->Nama;
        $barang->save();

        return response()->json([
            "message" => "barang record created"
        ], 201);
    }

    public function updateBarang(Request $request, $id){
        barang::where('ID_Barang', $request->id)->update([
            'Nama'=>$request->Nama
        ]);

        return response()->json([
            "message" => "barang record updated"
        ], 201);
    }
}