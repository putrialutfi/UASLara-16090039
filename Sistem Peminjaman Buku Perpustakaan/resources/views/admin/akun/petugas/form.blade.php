@if(isset($petugas))
  {!! Form::hidden('id', $petugas->id) !!}
@endif

{{ csrf_field() }}

@if ($errors->any())
  <div class="form-group {{ $errors->has('name') ? 'has-error' : 'has-success'}}">
@else
  <div class="form-group">
    @endif
    {!! Form::label('name', 'Nama Anggota : ', ['class' => 'col-sm-2 control-label text-right']) !!}
    <div class="col-sm-10">
      {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama Lengkap']) !!}
      @if ($errors->has('name'))
        <span class="help-block">{{ $errors->first('name') }}</span>
      @endif
    </div>
  </div>

  @if ($errors->any())
    <div class="form-group {{ $errors->has('tempat_lahir') ? 'has-error' : 'has-success'}}">
  @else
    <div class="form-group">
      @endif
      {!! Form::label('tempat_lahir', 'Tempat Lahir : ', ['class' => 'col-sm-2 control-label text-right']) !!}
      <div class="col-sm-10">
        {!! Form::text('tempat_lahir', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Tempat Lahir']) !!}
        @if ($errors->has('tempat_lahir'))
          <span class="help-block">{{ $errors->first('tempat_lahir') }}</span>
        @endif
      </div>
    </div>

@if ($errors->any())
  <div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error' : 'has-success'}}">
@else
  <div class="form-group">
    @endif
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir : ', ['class' => 'col-sm-2 control-label text-right']) !!}
    <div class="col-sm-10">
      {!! Form::date('tanggal_lahir', !empty($petugas) ? $petugas->tanggal_lahir -> format('Y-m-d') : null, ['class' => 'form-control']) !!}
      @if ($errors->has('tanggal_lahir'))
        <span class="help-block">{{ $errors->first('tanggal_lahir') }}</span>
      @endif
    </div>
  </div>

@if ($errors->any())
  <div class="form-group {{ $errors->has('no_telp') ? 'has-error' : 'has-success'}}">
@else
  <div class="form-group">
    @endif
    {!! Form::label('no_telp', 'No. Telp : ', ['class' => 'col-sm-2 control-label text-right']) !!}
    <div class="col-sm-10">
      {!! Form::text('no_telp', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nomor Telepon']) !!}
      @if ($errors->has('no_telp'))
        <span class="help-block">{{ $errors->first('no_telp') }}</span>
      @endif
    </div>
  </div>

  {!! Form::hidden('status', '1') !!}

@if ($errors->any())
  <div class="form-group {{ $errors->has('alamat') ? 'has-error' : 'has-success'}}">
@else
  <div class="form-group">
    @endif
    {!! Form::label('alamat', 'Alamat : ', ['class' => 'col-sm-2 control-label text-right']) !!}
    <div class="col-sm-10">
      {!! Form::text('alamat', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Alamat']) !!}
      @if ($errors->has('alamat'))
        <span class="help-block">{{ $errors->first('alamat') }}</span>
      @endif
    </div>
  </div>

@if ($errors->any())
  <div class="form-group {{ $errors->has('email') ? 'has-error' : 'has-success'}}">
@else
  <div class="form-group">
    @endif
    {!! Form::label('email', 'Email : ', ['class' => 'col-sm-2 control-label text-right']) !!}
    <div class="col-sm-10">
      {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Email']) !!}
      @if ($errors->has('email'))
        <span class="help-block">{{ $errors->first('email') }}</span>
      @endif
    </div>
  </div>

@if ($errors->any())
  <div class="form-group {{ $errors->has('username') ? 'has-error' : 'has-success'}}" style="margin-top: 20px">
@else
  <div class="form-group" style="margin-top: 20px">
    @endif
    {!! Form::label('username', 'Username : ', ['class' => 'col-sm-2 control-label text-right']) !!}
    <div class="col-sm-10">
      {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Username']) !!}
      @if ($errors->has('username'))
        <span class="help-block">{{ $errors->first('username') }}</span>
      @endif
    </div>
  </div>

@if ($errors->any())
  <div class="form-group {{ $errors->has('password') ? 'has-error' : 'has-success'}}">
@else
  <div class="form-group">
    @endif
    {!! Form::label('password', 'Password : ', ['class' => 'col-sm-2 control-label text-right', 'style'=>'margin-top: 10px']) !!}
    <div class="col-sm-10">
      {!! Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Password']) !!}
      @if ($errors->has('password'))
        <span class="help-block">{{ $errors->first('password') }}</span>
      @endif
    </div>
  </div>

{!! Form::submit('Tambah', ['class' => 'btn btn-gradient btn-primary center-block', 'style' => 'margin-top: 30px;']) !!}
