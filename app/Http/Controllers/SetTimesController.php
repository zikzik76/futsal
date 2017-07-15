<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\SetTime;
use Yajra\Datatables\Html\Builder;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreSetTimeRequest;
use App\Http\Requests\UpdateSetTimeRequest;

class SetTimesController extends Controller
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
        $set_times = SetTime::select(['id','time_group','jam_awal','jam_akhir']);
        return Datatables::of($set_times)
        ->addColumn('action', function($set_time){
          return view('datatable._action', [
            'model' => $set_time,
            'form_url'=>route('set_times.destroy', $set_time->id),
            'edit_url'=>route('set_times.edit', $set_time->id),
            'confirm_message'=>'yakin mau hapus ?'
          ]);
        })
        ->make(true);
      }

      $html = $htmlBuilder
        ->addColumn(['data'=>'id','name'=>'id','title'=>'No.'])
        ->addColumn(['data'=>'time_group','name'=>'time_group','title'=>'Time Group'])
        ->addColumn(['data'=>'jam_awal','name'=>'jam_awal','title'=>'Jam Awal'])
        ->addColumn(['data'=>'jam_akhir','name'=>'jam_akhir','title'=>'Jam Akhir'])
        ->addColumn(['data'=> 'action' , 'name' => 'action' , 'title' => '' ,
        'orderable' =>false , 'searchable' => false ]);

        return view('set_times.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view ('set_times.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSetTimeRequest $request)
    {
      $set_time= SetTime::create($request->all());
      //buat session, notif kepada user bahwa yang dikerjakan nya telah terindeks sistem
      Session::flash("flash_notification",[
        "level"=>"success",
        "message"=>"Berhasil Menyimpan Jadwal"
      ]);
      return redirect()->route('set_times.index');
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

        $set_time =SetTime::find($id);
        return view('set_times.edit')->with(compact('set_time'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSetTimeRequest $request, $id)
    {

        $set_time = SetTime::find($id);
        $set_time->update($request->all());
        //pesan simpan
        Session::flash("flash_notification",[
          "level"=>"success",
          "message"=>"Berhasil Mengubah Lapangan"
        ]);

        return redirect()->route('set_times.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $set_time=SetTime::find($id);
        $set_time->delete();

        Session::flash("flash_notification",[
          "level"=>"success",
          "message"=>"Berhasil menghapus"
        ]);
        return redirect()->route('set_times.index');
    }
}
