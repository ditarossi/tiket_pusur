<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Wisata;
use App\Models\Fasilitas;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Detail::all();
        return view('admin2.detail.tabel_detail', compact(
            'datas'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Detail;
        $wisatas = Wisata::all();
        $fas = Fasilitas::all();
        return view('admin2.detail.create_detail', compact(
            'model', 'wisatas', 'fas'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Detail;
        $model->wisata_id = $request->wisata_id;
        $model->fasilitas_id = $request->fasilitas_id;
        $model->deskripsi = $request->deskripsi;
        $model->keterangan = $request->keterangan;
        $model->foto = $request->foto;
        $model->save();

        return redirect('tbl_detail');
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
        $model = Detail::find($id);
        $wisatas = Wisata::all();
        return view('admin2.detail.update_detail', compact(
            'model', 'wisatas'
        ));
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
        $model = Detail::find($id);

        $model->wisata_id = $request->wisata_id;
        $model->fasilitas_id = $request->fasilitas_id;
        $model->deskripsi = $request->deskripsi;
        $model->keterangan = $request->keterangan;
        $model->foto = $request->foto;
        $model->save();

        return redirect('tbl_detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Detail::find($id);
        $model->delete();
        return redirect('tbl_detail');
    }
}
