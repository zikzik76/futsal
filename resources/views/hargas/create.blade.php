@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li> <a href=" {{ url('/home') }}">Dashboard</a></li>
        <li><a href="{{ url('hargas.index') }}">Harga Sewa</a></li>
        <li class="active">Ubah Settingan Harga</li>
      </ul>
      <div class="panel panel-default">

        <div class="panel-heading">
          <h2 class="panel-title">Ubah Settingan Harga</h2>
        </div>

        <div class="panel-body">
          {!! Form::open(['url'=>route('hargas.store'),
          'method'=>'post','files'=>'true','class'=>'form-horizontal']) !!}
          @include('hargas._form')
          {!! Form::close() !!}
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
<!-- ,'enctype'=>'multipart/form-data' -->
