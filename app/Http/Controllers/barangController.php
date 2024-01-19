<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->input('katakunci');
        $jumlahbaris = 4;
        if(strlen($katakunci)) {
            $data = barang::where('kode','like',"%$katakunci%")
                ->orWhere('nama_barang', 'like', "%$katakunci%")
                ->orWhere('jumlah', 'like', "%$katakunci%")
                ->orWhere('suplier', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        }else{
            $data = barang::orderBy('kode', 'desc')->paginate($jumlahbaris);
        }   
        return view('barang.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('kode',$request->kode);
        Session::flash('nama_barang',$request->nama_barang);
        Session::flash('jumlah',$request->jumlah);
        Session::flash('suplier',$request->suplier);
        
        $request->validate([
            'kode'=>'required|numeric|unique:barang,kode',
            'nama_barang'=>'required',
            'jumlah'=>'required',
            'suplier'=>'required',
        ],[
            'kode.required' => 'kode wajib diisi',
            'kode.numeric' => 'kode wajib dalam angka',
            'kode.unique' => 'kode yang diisikan sudah ada didalam database',
            'nama_barang.required' => 'nama_barang wajib diisi',
            'jumlah.required' => 'jumlah wajib diisi',
            'suplier.required' => 'suplier wajib diisi',
        ]);
        $data =[
            'kode'=>$request->kode,
            'nama_barang'=>$request->nama_barang,
            'jumlah'=>$request->jumlah,
            'suplier'=>$request->suplier,
        ];
        barang::create($data);
        return redirect()->to('barang')->with('success', 'Berhasil menambahkan data');

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =barang::where('kode',$id)->first();
        return view('barang.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang'=>'required',
            'jumlah'=>'required',
            'suplier'=>'required',
        ],[
            'nama_barang.required' => 'nama_barang wajib diisi',
            'jumlah.required' => 'jumlah wajib diisi',
            'suplier.required' => 'suplier wajib diisi',
        ]);
        $data =[
            'nama_barang'=>$request->nama_barang,
            'jumlah'=>$request->jumlah,
            'suplier'=>$request->suplier,
        ];
        barang::where('kode',$id)->update($data);
        return redirect()->to('barang')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        barang::where('kode',$id)->delete();
        return redirect()->to('barang')->with('success','Berhasil melakukan delete data');
    }
}
