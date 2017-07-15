<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use Yajra\Datatables\Html\Builder;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;

class JadwalsController extends Controller
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
        $jadwals = Jadwal::select(['id','tanggal','petugas','id_lapangan','id_sewa','jam']);
        return Datatables::of($jadwals)
        ->addColumn('action', function($jadwal){
          return view('datatable._action', [
            'model' => $jadwal,
            'form_url'=>route('jadwals.destroy', $jadwal->id),
            'edit_url'=>route('jadwals.edit', $jadwal->id),
            'confirm_message'=>'yakin mau hapus jadwal ini ?'
          ]);
        })
        ->make(true);
      }

      $html = $htmlBuilder
        ->addColumn(['data'=>'id','name'=>'id','title'=>'No.'])
        ->addColumn(['data'=>'tanggal','name'=>'tanggal','title'=>'tanggal'])
        ->addColumn(['data'=>'petugas','name'=>'petugas','title'=>'Petugas'])
        ->addColumn(['data'=>'id_lapangan','name'=>'id_lapangan','title'=>'ID Lapangan'])
        ->addColumn(['data'=>'id_sewa','name'=>'id_sewa','title'=>'ID Sewa'])
        ->addColumn(['data'=>'jam', 'name'=>'jam','title'=>'Jam' ])
        ->addColumn(['data'=> 'action' , 'name' => 'action' , 'title' => '' ,
        'orderable' =>false , 'searchable' => false ]);

        return view('jadwals.index')->with(compact('html'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('jadwals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJadwalRequest $request)
    {
      $jadwal= Jadwal::create($request->all());
      //buat session, notif kepada user bahwa yang dikerjakan nya telah terindeks sistem
      Session::flash("flash_notification",[
        "level"=>"success",
        "message"=>"Berhasil Menyimpan Jadwal"
      ]);
      return redirect()->route('jadwals.index');
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
      $jadwal =Jadwal::find($id);
      return view('jadwals.edit')->with(compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJadwalRequest $request, $id)
    {
      $jadwal = Jadwal::find($id);
      $jadwal->update($request->all());
      //pesan simpan
      Session::flash("flash_notification",[
        "level"=>"success",
        "message"=>"Berhasil Mengubah Lapangan"
      ]);

      return redirect()->route('jadwals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $jadwal=Jadwal::find($id);
      $jadwal->delete();

      Session::flash("flash_notification",[
        "level"=>"success",
        "message"=>"Berhasil menghapus lapangan"
      ]);
      return redirect()->route('jadwals.index');
}
}
