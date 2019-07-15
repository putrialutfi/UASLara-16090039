
@if ($errors->any())
  <div class="form-group {{ $errors->has('judul_buku') ? 'has-error' : 'has-success'}}">
@else
  <div class="form-group">
    @endif
    {!! Form::label('judul_buku', 'Judul Buku : ', ['class' => 'col-sm-2 control-label text-right']) !!}
    <div class="col-sm-10">
      {!! Form::text('judul_buku', null, ['class' => 'form-control', 'placeholder' => 'Judul Buku']) !!}
      @if ($errors->has('judul_buku'))
        <span class="help-block">{{ $errors->first('judul_buku') }}</span>
      @endif
    </div>
  </div>

@if ($errors->any())
  <div class="form-group {{ $errors->has('id_rak') ? 'has-error' : 'has-success'}}" style="margin-top: 20px;">
@else
  <div class="form-group" style="margin-top: 20px;">
    @endif
    {!! Form::label('id_rak', 'Rak : ', ['class'=>'col-sm-2 control-label text-right', 'style'=>'margin-top: 5px']) !!}
    <div class="col-sm-10">
      {!! Form::text('id_rak', null, ['class' => 'form-control', 'placeholder' => '-- Pilih Rak --']) !!}
      <div id="rak_list"></div>
      @if ($errors->has('id_rak'))
        <span class="help-block">{{ $errors->first('id_rak') }}</span>
      @endif
    </div>
  </div>

@if ($errors->any())
  <div class="form-group {{ $errors->has('id_penulis') ? 'has-error' : 'has-success'}}" style="margin-top: 20px;">
@else
  <div class="form-group" style="margin-top: 20px;">
    @endif
    {!! Form::label('id_penulis', 'Penulis : ', ['class'=>'col-sm-2 control-label text-right', 'style'=>'margin-top: 5px']) !!}
    <div class="col-sm-10">
      {!! Form::text('id_penulis', null, ['class' => 'form-control', 'placeholder' => '-- Pilih Penulis --']) !!}
      <div id="penulis_list"></div>
      @if ($errors->has('id_penulis'))
        <span class="help-block">{{ $errors->first('id_penulis') }}</span>
      @endif
    </div>
  </div>

@if ($errors->any())
  <div class="form-group {{ $errors->has('id_kategori') ? 'has-error' : 'has-success'}}" style="margin-top: 20px;">
@else
  <div class="form-group" style="margin-top: 20px;">
    @endif
    {!! Form::label('id_kategori', 'Kategori : ', ['class'=>'col-sm-2 control-label text-right', 'style'=>'margin-top: 5px']) !!}
    <div class="col-sm-10">
      {!! Form::text('id_kategori', null, ['class' => 'form-control', 'placeholder' => '-- Pilih Kategori --']) !!}
      <div id="kategori_list"></div>
      @if ($errors->has('id_kategori'))
        <span class="help-block">{{ $errors->first('id_kategori') }}</span>
      @endif
    </div>
  </div>

@if ($errors->any())
  <div class="form-group {{ $errors->has('id_penerbit') ? 'has-error' : 'has-success'}}" style="margin-top: 20px;">
@else
  <div class="form-group" style="margin-top: 20px;">
    @endif
    {!! Form::label('id_penerbit', 'Penerbit : ', ['class'=>'col-sm-2 control-label text-right', 'style'=>'margin-top: 5px']) !!}
    <div class="col-sm-10">
      {!! Form::text('id_penerbit', null, ['class' => 'form-control', 'placeholder' => '-- Pilih Penerbit --']) !!}
      <div id="penerbit_list"></div>
      @if ($errors->has('id_penerbit'))
        <span class="help-block">{{ $errors->first('id_penerbit') }}</span>
      @endif
    </div>
  </div>

@if ($errors->any())
  <div class="form-group {{ $errors->has('tahun') ? 'has-error' : 'has-success'}}" style="margin-top: 20px;">
@else
  <div class="form-group" style="margin-top: 20px;">
    @endif
    {!! Form::label('tahun', 'Tahun : ', ['class'=>'col-sm-2 control-label text-right']) !!}
    <div class="col-sm-10">
      {!! Form::number('tahun', null, ['class' => 'form-control', 'placeholder' => 'Tahun']) !!}
      @if ($errors->has('tahun'))
        <span class="help-block">{{ $errors->first('tahun') }}</span>
      @endif
    </div>
  </div>
<br>
@if ($errors->any())
  <div class="form-group {{ $errors->has('no_isbn') ? 'has-error' : 'has-success'}}" style="margin-top: 80px;">
@else
  <div class="form-group" style="margin-top: 20px;">
    @endif
    {!! Form::label('no_isbn', 'No. ISBN : ', ['class'=>'col-sm-2 control-label text-right']) !!}
    <div class="col-sm-10">
      {!! Form::text('no_isbn', null, ['class' => 'form-control', 'placeholder' => 'No. ISBN']) !!}
      @if ($errors->has('no_isbn'))
        <span class="help-block">{{ $errors->first('no_isbn') }}</span>
      @endif
    </div>
  </div>

{!! Form::submit('Simpan', ['class' => 'btn btn-gradient btn-primary center-block', 'style' => 'margin-top: 30px;']) !!}

<!-- script for getting auto complete of data rak -->
<script>
$(document).ready(function(){
  $('#id_rak').keyup(function(){
    var query = $(this).val();
    if(query != '') {
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url:"{{ route('autorak') }}",
        method:"POST",
        data:{query:query, _token:_token},
        success:function(data){
          $('#rak_list').fadeIn();
          $('#rak_list').html(data);
        },
        error: function(e) {
          console.log('Error!', e);
        }
      });
    }
  });
  $(document).on('click', 'li.rak', function(){
    $('#id_rak').val($(this).text());
    $('#rak_list').fadeOut();
  });
});
</script>

<!-- script for getting auto complete of data penulis -->
<script>
$(document).ready(function(){
  $('#id_penulis').keyup(function(){
    var query = $(this).val();
    if(query != '') {
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url:"{{ route('autopenulis') }}",
        method:"POST",
        data:{query:query, _token:_token},
        success:function(data){
          $('#penulis_list').fadeIn();
          $('#penulis_list').html(data);
        },
        error: function(e) {
          console.log('Error!', e);
        }
      });
    }
  });
  $(document).on('click', 'li.penulis', function(){
    $('#id_penulis').val($(this).text());
    $('#penulis_list').fadeOut();
  });
});
</script>

<!-- script for getting auto complete of data kategori -->
<script>
$(document).ready(function(){
  $('#id_kategori').keyup(function(){
    var query = $(this).val();
    if(query != '') {
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url:"{{ route('autokategori') }}",
        method:"POST",
        data:{query:query, _token:_token},
        success:function(data){
          $('#kategori_list').fadeIn();
          $('#kategori_list').html(data);
        },
        error: function(e) {
          console.log('Error!', e);
        }
      });
    }
  });
  $(document).on('click', 'li.kategori', function(){
    $('#id_kategori').val($(this).text());
    $('#kategori_list').fadeOut();
  });
});
</script>

<!-- script for getting auto complete of data penerbit -->
<script>
$(document).ready(function(){
  $('#id_penerbit').keyup(function(){
    var query = $(this).val();
    if(query != '') {
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url:"{{ route('autopenerbit') }}",
        method:"POST",
        data:{query:query, _token:_token},
        success:function(data){
          $('#penerbit_list').fadeIn();
          $('#penerbit_list').html(data);
        },
        error: function(e) {
          console.log('Error!', e);
        }
      });
    }
  });
  $(document).on('click', 'li.penerbit', function(){
    $('#id_penerbit').val($(this).text());
    $('#penerbit_list').fadeOut();
  });
});
</script>
