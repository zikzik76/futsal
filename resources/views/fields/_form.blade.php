<!-- //kolom id lapangan -->
<div class="form-group{{$errors->has('id_lapangan') ? ' has-error' : '' }}">
  {!! Form::label('id_lapangan','ID', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('id_lapangan', null,['class'=>'form-control']) !!}
    {!! $errors->first('id_lapangan','<p class="help-block">:message</p>') !!}
  </div>
</div>

<!-- //kolom nama lapangan -->
<div class="form-group{{$errors->has('nama_lapangan') ? ' has-error' : '' }}">
  {!! Form::label('nama_lapangan','Nama Lapangan', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('nama_lapangan', null,['class'=>'form-control']) !!}
    {!! $errors->first('nama_lapangan','<p class="help-block">:message</p>') !!}
  </div>
</div>

<!-- //kolom Harga -->
<div class="form-group{{$errors->has('harga_sewa') ? ' has-error' : '' }}">
  {!! Form::label('harga_sewa','Harga', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('harga_sewa', null,['class'=>'form-control']) !!}
    {!! $errors->first('harga_sewa','<p class="help-block">:message</p>') !!}
  </div>
</div>

<!-- //kolom choose file teaaaa -->
<div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
  {!! Form::label('gambar', 'Gambar', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::file('gambar') !!}
    @if (isset($field) && $field->gambar)
      <p>
      {!! Html::image(asset('img/'.$field->gambar), null, ['class'=>'img-rounded img-responsive']) !!}
      </p>
    @endif
    {!! $errors->first('gambar', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {!! Form::submit('Simpan',['class'=>'btn btn-primary']) !!}
  </div>
</div>
