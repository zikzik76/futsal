@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li> <a href=" {{ url('/home') }}">Dashboard</a></li>
        <li><a href="{{ url('fields.index') }}">Lapangan</a></li>
        <li class="active">Ubah Lapangan</li>
      </ul>
      <div class="panel panel-default">

        <div class="panel-heading">
          <h2 class="panel-title">Ubah Lapangan</h2>
        </div>

        <div class="panel-body">
        {!! Form::model($field, ['url' => route('fields.update', $field->id),
        'method'=>'put','files'=>'true','class'=>'form-horizontal']) !!}
        @include('fields._form')
        {!! Form::close() !!}
      </div>

      </div>
    </div>
  </div>
</div>
@endsection
<!-- ,'enctype'=>'multipart/form-data' -->
