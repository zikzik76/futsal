<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;
use Yajra\Datatables\Html\Builder;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreFieldRequest;
use App\Http\Requests\UpdateFieldRequest;

class FieldsController extends Controller
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
        $fields = Field::select(['id','id_lapangan','nama_lapangan','harga_sewa','gambar']);
        return Datatables::of($fields)
        ->addColumn('action', function($field){
          return view('datatable._action', [
            'model' => $field,
            'form_url'=>route('fields.destroy', $field->id),
            'edit_url'=>route('fields.edit', $field->id),
            'confirm_message'=>'yakin mau hapus '.$field->nama_lapangan .'?'
          ]);
        })
        ->make(true);
      }

      $html = $htmlBuilder
        ->addColumn(['data'=>'id_lapangan','name'=>'id_lapangan','title'=>'No.'])
        ->addColumn(['data'=>'nama_lapangan','name'=>'nama_lapangan','title'=>'Nama Lapangan'])
        ->addColumn(['data'=>'harga_sewa','name'=>'harga_sewa','title'=>'Harga Sewa'])
        ->addColumn(['data'=>'gambar','name'=>'gambar','title'=>'Gambar'])
        ->addColumn(['data'=> 'action' , 'name' => 'action' , 'title' => '' ,
        'orderable' =>false , 'searchable' => false ]);

        return view('fields.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('fields.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFieldRequest $request)
    {
        $field = Field::create($request->except('gambar'));
        if($request->hasFile('gambar')){
          //ambil file yang diupload
        $uploaded_gambar = $request->file('gambar');

        //ambil ekstensen file nya
        $extension = $uploaded_gambar->getClientOriginalExtension();

        //membuat nama file random berikut extension
        $filename = md5(time()) . '.' . $extension;

        //menyimpan file ke folder public/img
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        $uploaded_gambar->move($destinationPath, $filename);

        //mengisi field cover di book dengan file name yang baru di buat
        $field->gambar=$filename;
        $field->save();
      }
      Session::flash("flash_notification",[
        "level"   => "success",
        "message" => "Berhasil Menyimpan $field->nama_lapangan"
      ]);

      return redirect()->route('fields.index');


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
        $field = Field::find($id);
        return view('fields.edit')->with(compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFieldRequest $request, $id)
    {
        $field = Field::find($id);
        $field->update($request->all());

        if ($request->hasFile('gambar')){
          $filename = null;
          $uploaded_gambar = $request->file('gambar');
          $extension = $uploaded_gambar->getClientOriginalExtension();

          $filename = md5(time()).'.'.$extension;
          $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';

          if($field->gambar){
            $old_gambar = $field->gambar;
            $filepath = public_path(). DIRECTORY_SEPARATOR . 'img'
            .DIRECTORY_SEPARATOR . $field->gambar;

            try {
              File::delete($filepath);
            } catch (FileNotFoundException $e) {
              //file sudah i hapus
            }
          }
          //ganti
          $field->gambar=$filename;
          $field->save();
        }
        //pesan simpan
        Session::flash("flash_notification",[
          "level"=>"success",
          "message"=>"Berhasil Mengubah Lapangan"
        ]);

        return redirect()->route('fields.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $field=Field::find($id);
        //hapus
        if($field->gambar){
          $old_gambar = $field->gambar;
          $filepath = public_path() . DIRECTORY_SEPARATOR . 'img'
          . DIRECTORY_SEPARATOR . $field->gambar;

          try {
            File::delete($filepath);
          }catch (FileNotFoundException $e){
          //file sudah di hapus/tidak Ada
        }
    }

    $field->delete();

    Session::flash("flash_notification",[
      "level"=>"success",
      "message"=>"Berhasil menghapus lapangan"
    ]);
    return redirect()->route('fields.index');
}
}
