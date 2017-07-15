<!-- //kolom id lapangan -->
<!-- <div class="form-group{{$errors->has('id_lapangan') ? ' has-error' : '' }}">
  {!! Form::label('id_lapangan','ID', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('id_lapangan', null,['class'=>'form-control']) !!}
    {!! $errors->first('id_lapangan','<p class="help-block">:message</p>') !!}
  </div>
</div> -->

<!-- //kolom nama lapangan -->
<div class="form-group{{$errors->has('time_group') ? ' has-error' : '' }}">
  {!! Form::label('time_group','Time Group', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('time_group', null,['class'=>'form-control']) !!}
    {!! $errors->first('time_group','<p class="help-block">:message</p>') !!}
  </div>
</div>

<!-- //kolom Harga -->
<div class="form-group{{$errors->has('status_pelanggan') ? ' has-error' : '' }}">
  {!! Form::label('status_pelanggan','Status Pelanggan', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('status_pelanggan', null,['class'=>'form-control']) !!}
    {!! $errors->first('status_pelanggan','<p class="help-block">:message</p>') !!}
  </div>
</div>

<!-- //kolom choose file teaaaa -->
<div class="form-group{{ $errors->has('id_lapangan') ? ' has-error' : '' }}">
  {!! Form::label('id_lapangan', 'ID Lapangan', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('id_lapangan', null,['class'=>'form-control']) !!}
    {!! $errors->first('id_lapangan','<p class="help-block">:message</p>') !!}
  </div>
</div>

<!-- //kolom choose file teaaaa -->
<div class="form-group{{ $errors->has('harga_sewa') ? ' has-error' : '' }}">
  {!! Form::label('harga_sewa', 'Harga Sewa', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('harga_sewa', null,['class'=>'form-control']) !!}
    {!! $errors->first('harga_sewa','<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {!! Form::submit('Simpan',['class'=>'btn btn-primary']) !!}
  </div>
</div>
