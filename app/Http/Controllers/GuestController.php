<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Field;
use Laratrust\LaratrustFacade as Laratrust;

class GuestController extends Controller
{
  public function index(Request $request, Builder $htmlBuilder)
{
if ($request->ajax()) {
  $fields = Field::select(['id','id_lapangan','nama_lapangan','harga_sewa','gambar']);
  return Datatables::of($fields)
->addColumn('action', function($field){
if (Laratrust::hasRole('admin')) return '';
return '<a class="btn btn-xs btn-primary" href="/events">Sewa</a>';
})->make(true);
}
$html = $htmlBuilder
->addColumn(['data'=>'id_lapangan','name'=>'id_lapangan','title'=>'No.'])
->addColumn(['data'=>'nama_lapangan','name'=>'nama_lapangan','title'=>'Nama Lapangan'])
->addColumn(['data'=>'harga_sewa','name'=>'harga_sewa','title'=>'Harga Sewa'])
->addColumn(['data'=>'gambar','name'=>'gambar','title'=>'Gambar'])
->addColumn(['data'=> 'action' , 'name' => 'action' , 'title' => '' ,
'orderable' =>false , 'searchable' => false ]);
return view('guest.index')->with(compact('html'));
}
}
