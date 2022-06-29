<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kegiatan;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Kegiatan::all();
        return view('admin2.kegiatan.tabel_kegiatan', compact(
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
        $model = new Kegiatan;
        // $data_fas = $fas->keyBy('id')->toArray();
        return view('admin2.kegiatan.create_kegiatan', compact(
            'model'
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
        $path = $request->file('foto')->move('fotowisata', $request->file('foto')->getClientOriginalName());
        $model = new Kegiatan;
        $model->nama_kegiatan = $request->nama_kegiatan;
        $model->deskripsi = $request->deskripsi;
        $model->foto = $path;
        $model->save();

        return redirect('tbl_kegiatan');
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
        $model = Kegiatan::find($id);
        return view('admin2.kegiatan.update_kegiatan', compact(
            'model'
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
        $model = Kegiatan::find($id);
        $model->update($request->all());
        //NOT YET
        // if($request->hasFile('foto'))
        // {
        //      $request->file('foto')->move('fotowisata', $request->file('foto')->getClientOriginalName());
        //      $model->foto = $request->file('foto')->getClientOriginalName();
        //      $model->save();
        // }
        if($request->hasFile('foto'))
        {
            $path = $request->file('foto')->move('fotowisata', $request->file('foto')->getClientOriginalName());
            $model->foto = $path;
        }

        // $model->nama_kegiatan = $request->nama_kegiatan;
        // $model->deskripsi = $request->deskripsi;

        $model->save();

        return redirect('tbl_kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Kegiatan::find($id);
        $model->delete();
        return redirect('tbl_kegiatan');
    }
}
