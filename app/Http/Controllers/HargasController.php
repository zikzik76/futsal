<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Harga;
use Yajra\Datatables\Html\Builder;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreHargaRequest;
use App\Http\Requests\UpdateHargaRequest;

class HargasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {

        if ($request->ajax())
        {
          $hargas = Harga::select(['id','time_group','status_pelanggan','id_lapangan','harga_sewa']);
          return Datatables::of(  $hargas)
          ->addColumn('action', function($harga){
            return view('datatable._action', [
              'model' => $harga,
              'form_url'=>route('hargas.destroy', $harga->id),
              'edit_url'=>route('hargas.edit', $harga->id),
              'confirm_message'=>'yakin mau hapus Harga ini ?'
            ]);
          })
          ->make(true);
        }

        $html = $htmlBuilder
          ->addColumn(['data'=>'id','name'=>'id','title'=>'No.'])
          ->addColumn(['data'=>'time_group','name'=>'time_group','title'=>'Time Group'])
          ->addColumn(['data'=>'id_lapangan','name'=>'id_lapangan','title'=>'id_lapangan'])
          ->addColumn(['data'=>'status_pelanggan','name'=>'status_pelanggan','title'=>'Status Pelanggan'])
          ->addColumn(['data'=>'harga_sewa','name'=>'harga_sewa','title'=>'Harga Sewa'])
          ->addColumn(['data'=> 'action' , 'name' => 'action' , 'title' => '' ,
          'orderable' =>false , 'searchable' => false ]);

          return view('hargas.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('hargas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHargaRequest $request)
    {

        $harga= Harga::create($request->all());
        //buat session, notif kepada user bahwa yang dikerjakan nya telah terindeks sistem
        Session::flash("flash_notification",[
          "level"=>"success",
          "message"=>"Berhasil Menyimpan Jadwal"
        ]);
        return redirect()->route('hargas.index');
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

              $harga =Harga::find($id);
              return view('hargas.edit')->with(compact('harga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHargaRequest $request, $id)
    {

        $harga = Harga::find($id);
        $harga->update($request->all());
        //pesan simpan
        Session::flash("flash_notification",[
          "level"=>"success",
          "message"=>"Berhasil Mengubah Lapangan"
        ]);

        return redirect()->route('hargas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $harga=Harga::find($id);
      $harga->delete();

      Session::flash("flash_notification",[
        "level"=>"success",
        "message"=>"Berhasil menghapus"
      ]);
      return redirect()->route('hargas.index');
    }
}
