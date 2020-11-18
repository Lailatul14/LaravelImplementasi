<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class customerController extends Controller
{
    //

	// public function create(){
	// 	return view('customer/create');
	// }

	public function index(){
        $customer = DB::table('customer')->orderby('ID_CUSTOMER', 'asc')->get();
        $kelurahan = DB::table('kelurahan')->get();
		return view('customer/index', ['customer' => $customer, 'kelurahan' => $kelurahan]);
	}

    public function create(){
	    $provinsi = DB::table('provinsi')->pluck("NAMA_PROVINSI","ID_PROVINSI");
        return view('customer/create1',compact('provinsi'));
 	}

    public function getStates($id) 
    {
        $kota = DB::table('kota')->where("ID_PROVINSI",$id)->pluck("NAMA_KOTA","ID_KOTA");
        return json_encode($kota);
    }

    public function kecamatan($id) 
    {
        $kecamatan = DB::table('kecamatan')->where("ID_KOTA",$id)->pluck("NAMA_KECAMATAN","ID_KECAMATAN");
        return json_encode($kecamatan);
    }
    public function kelurahan($id) 
    {
        $kelurahan = DB::table('kelurahan')->where('ID_KECAMATAN', $id)->get();
        return json_encode($kelurahan);
    }
    
    public function store(Request $request)
    {

        DB::table('customer')->insert([
            'ID_KELURAHAN' => $request->kelurahan,
            'NAMA' => $request->nama,
            'ALAMAT' => $request->alamat,
            'FOTO' => base64_encode($request->foto)
        ]);
        return redirect('customerCreate1');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function create2(){

	    $provinsi = DB::table('provinsi')->pluck("NAMA_PROVINSI","ID_PROVINSI");
        return view('customer/create2',compact('provinsi'));
 	}

    public function getStates2($id) 
    {
        $kota = DB::table('kota')->where("ID_PROVINSI",$id)->pluck("NAMA_KOTA","ID_KOTA");
        return json_encode($kota);
    }

    public function kecamatan2($id) 
    {
        $kecamatan = DB::table('kecamatan')->where("ID_KOTA",$id)->pluck("NAMA_KECAMATAN","ID_KECAMATAN");
        return json_encode($kecamatan);
    }

    public function kelurahan2($id) 
    {
        $kelurahan = DB::table('kelurahan')->where("ID_KECAMATAN",$id)->get();
        return json_encode($kelurahan);
    }

   public function store2(Request $request)
    {
        //decode base64 ke png
        $foto1 = $request->foto;
        $foto2 = str_replace('data:image/jpeg;base64,','',$foto1);
        $foto3 = str_replace(' ', '+', $foto2);
        $foto_png = base64_decode($foto3);

        //nama foto
        $nama_foto1 = time(). $request->nama . '.jpeg';
        $nama_foto2 = str_replace(' ', '_', $nama_foto1);

        //path foto 
        $path = '/foto/'.$nama_foto2;

        //simpan foto ke path
        \File::put(base_path().'/public/foto/'.$nama_foto2, $foto_png);

        DB::table('customer')->insert([
            'ID_KELURAHAN' => $request->kelurahan,
            'NAMA' => $request->nama,
            'ALAMAT' => $request->alamat,
            'FILE_PATH' => $path
        ]);
        return redirect('customerCreate2');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        DB::table('customer')->where('ID_CUSTOMER',$request->idcustomer)->update([
            'ID_KELURAHAN' => $request->id_kelurahan,
            'NAMA'         => $request->nama,
            'ALAMAT'       => $request->alamat,
            'FOTO'         => $request->foto,
            'FILE_PATH'    => $request->file_path
            ]);

        return redirect('customerindex');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $customer = DB::table('customer')->where('ID_CUSTOMER',$id)->delete();
        return redirect('/customer');
        //return "ini Halaman Destroy";
    }

     
}