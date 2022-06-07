<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuktiTf;
use App\Models\Resi;

class BuktiTfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = BuktiTf::all();
        return view('admin2.bukti.tabel_bukti', compact(
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
        $model = new BuktiTf;
        return view('admin2.bukti.create_bukti', compact(
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
        $model = new BuktiTf;
        $model->users_id = $request->users_id;
        $model->resi_id = $request->resi_id;
        $model->foto = $request->foto;
        $model->save();

        return redirect('tbl_bukti');
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
        $model = BuktiTf::find($id);
        return view('admin2.bukti.update_bukti', compact(
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
        $model = BuktiTf::find($id);
        $model->users_id = $request->users_id;
        $model->resi_id = $request->resi_id;
        $model->foto = $request->foto;
        $model->save();

        return redirect('tbl_bukti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = BuktiTf::find($id);
        $model->delete();
        return redirect('tbl_bukti');
    }
}
