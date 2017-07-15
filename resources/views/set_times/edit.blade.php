@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li> <a href=" {{ url('/home') }}">Dashboard</a></li>
        <li><a href="{{ url('set_times.index') }}">Seting Jam</a></li>
        <li class="active">Ubah Settingan Jam</li>
      </ul>
      <div class="panel panel-default">

        <div class="panel-heading">
          <h2 class="panel-title">Ubah Settingan Jam</h2>
        </div>

        <div class="panel-body">
        {!! Form::model($set_time, ['url' => route('set_times.update', $set_time->id),
        'method'=>'put','files'=>'true','class'=>'form-horizontal']) !!}
        @include('set_times._form')
        {!! Form::close() !!}
      </div>

      </div>
    </div>
  </div>
</div>
@endsection
<!-- ,'enctype'=>'multipart/form-data' -->
