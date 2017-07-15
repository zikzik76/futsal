<!-- //kolom id lapangan -->
<div class="form-group{{$errors->has('tanggal') ? ' has-error' : '' }}">
 {!! Form::label('tanggal','Tanggal', ['class'=>'col-md-2 control-label']) !!}
 <div class="col-md-4">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="fa fa-btn fa-calendar"></span>
                    </span>
                </div>

        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
      </div>
    </div>
<!-- <div class="form-group{{$errors->has('tanggal') ? ' has-error' : '' }}">
  {!! Form::label('tanggal','Tanggal', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('tanggal', null,['class'=>'form-control']) !!}
    {!! $errors->first('tanggal','<p class="help-block">:message</p>') !!}
  </div>
</div> -->

<!-- //kolom nama lapangan -->
<div class="form-group{{$errors->has('petugas') ? ' has-error' : '' }}">
  {!! Form::label('petugas','Petugas', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('petugas', null,['class'=>'form-control']) !!}
    {!! $errors->first('petugas','<p class="help-block">:message</p>') !!}
  </div>
</div>

<!-- //kolom Harga -->
<div class="form-group{{$errors->has('id_lapangan') ? ' has-error' : '' }}">
  {!! Form::label('id_lapangan','ID Lapangan', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('id_lapangan', null,['class'=>'form-control']) !!}
    {!! $errors->first('id_lapangan','<p class="help-block">:message</p>') !!}
  </div>
</div>


<!-- //kolom Harga -->
<div class="form-group{{$errors->has('id_sewa') ? ' has-error' : '' }}">
  {!! Form::label('id_sewa','ID Sewa', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('id_sewa', null,['class'=>'form-control']) !!}
    {!! $errors->first('id_sewa','<p class="help-block">:message</p>') !!}
  </div>
</div>

<!-- //kolom Harga -->
<div class="form-group{{$errors->has('jam') ? ' has-error' : '' }}">
  {!! Form::label('jam','Jam', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    <div class="form-group">
                <div class='input-group date' id='datetimepicker3'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="fa fa-btn fa-clock-o "></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
            });
        </script>
    <!-- {!! Form::text('jam', null,['class'=>'form-control']) !!}
    {!! $errors->first('jam','<p class="help-block">:message</p>') !!} -->

  </div>


<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {!! Form::submit('Simpan',['class'=>'btn btn-primary']) !!}
  </div>
</div>
