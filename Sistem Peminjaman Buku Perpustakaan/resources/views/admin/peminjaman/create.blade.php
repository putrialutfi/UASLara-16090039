@extends('admin.template')

@section('main')
<!-- tambah data -->
<div class="panel box-shadow-none content-header">
   <div class="panel-body">
     <div class="col-md-12">
         <h3 class="animated fadeInLeft">Peminjaman Buku</h3>
         <p class="animated fadeInDown">
           Peminjaman <span class="fa-angle-right fa"></span> Peminjaman Buku
         </p>
     </div>
   </div>
</div>
<div class="form-element">
  <div class="col-md-12 padding-0">
    <div class="col-md-12">
      <div class="panel form-element-padding">
        <div class="panel-heading">
         <h4>Form Peminjaman Buku</h4>
        </div>

        <div class="panel-body" style="padding-bottom:30px;">
          {!! Form::open(['method'=>'post', 'url' => 'admin/peminjaman', 'id'=>'buku-form']) !!}
            {{ csrf_field() }}
            <div class="col-md-12">

              <div class="form-group">
                {!! Form::label('kode_peminjaman', 'Kode Peminjaman :', ['class'=>'col-sm-2 control-label text-right']) !!}
                <div class="col-sm-10">
                  {!! Form::text('kode_peminjaman', $id, ['class' => 'form-control', 'disabled', 'value'=>$id]) !!}
                </div>
              </div>

                <div class="col-md-6">

                  @if ($errors->any())
                    <div class="form-group {{ $errors->has('id_anggota') ? 'has-error' : 'has-success'}}">
                  @else
                    <div class="form-group">
                      @endif
                      {!! Form::label('id_anggota', 'Anggota (Peminjam)  : ', ['class' => 'control-label text-right']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('id_anggota', null, ['class' => 'form-control', 'id'=>'id_anggota', 'style'=>'margin-top: 0px']) !!}
                        <div id="anggota_list"></div>
                        @if ($errors->has('id_anggota'))
                          <span class="help-block">{{ $errors->first('id_anggota') }}</span>
                        @endif
                      </div>
                    </div>


                    @if ($errors->has('id_kodebuku.0'))
                      <span class="help-block" style="color: red;"><br>{{ $errors->first('id_kodebuku.0') }}</span>
                    @endif
                  <div class="col-sm-10" id="input-buku">

                  </div>

                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    {!! Form::label('tgl_pinjam', 'Tgl. Pinjam  : ', ['class' => 'control-label text-right']) !!}
                    <div class="form-animate-text">
                      {!! Form::date('tgl_pinjam', now(), ['class' => 'form-text datetime', 'disabled']) !!}
                    </div>
                  </div>

                  <div class="form-group">
                    {!! Form::label('tgl_kembali', 'Tgl. Pinjam  : ', ['class' => 'control-label text-right']) !!}
                    <div class="form-animate-text">
                      {!! Form::date('tgl_kembali', $tgl_kembali, ['class' => 'form-text datetime', 'disabled']) !!}
                    </div>
                  </div>

                </div>

            </div>
          {!! Form::button('Simpan Peminjaman', ['type'=>'submit', 'class'=>'btn btn-gradient btn-primary center-block', 'id'=>'save', 'style'=>'margin-top: 30px;']) !!}
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>

<!-- script for adding text field -->
<script>
$(document).ready(function(){
  var count = 1;
  dynamic_field(count);
  function dynamic_field(number) {
    html = '<div class="input-group">';
    html += '<input type="text" name="id_kodebuku[]" class="form-control" id="id_kodebuku'+count+'" placeholder="Masukkan Buku"/>';
    html += '<div id="buku_list'+count+'"></div>';
    if(number > 1) {
      html += '<span class="input-group-btn"><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></span>';
      $('#input-buku').append(html);
    } else {
      html += '<span class="input-group-btn"><button type="button" name="add" id="add" class="btn btn-success">Add</button></span>';
      $('#input-buku').html(html);
    }
  }

  $(document).on('click', '#add', function(){
    count++;
    dynamic_field(count);
    $('#save').attr('disabled',true);
    var id_kodebuku = '#id_kodebuku'+count;
    var buku_list = '#buku_list'+count;
    var _token = $('input[name="_token"]').val();
    $(id_kodebuku).keyup(function(){
      var query = $(this).val();
      if(query != '') {
        $.ajax({
          url:"{{ route('autobuku') }}",
          method:"POST",
          data:{query:query, _token:_token, count:count},
          success:function(data){
            $(buku_list).fadeIn();
            $(buku_list).html(data);
          },
          error: function(e) {
            console.log('Error!', e);
          }
        });
      }
    });
    var libuku = 'li.buku'+count;
    $(document).on('click', libuku, function(){
      $(id_kodebuku).val($(this).text());
      $(buku_list).fadeOut();
      $('#save').attr('disabled',false);
    });
  });

  $(document).on('click', '.remove', function(){
    count--;
    $(this).closest("div").remove();
    $('#save').attr('disabled',false);
  });

  $(document).ready(function(){
    $('#save').attr('disabled',true);
    $('#id_kodebuku').keyup(function(){
    if($(this).val().length !=0)
      $('#save').attr('disabled', false);
    else
      $('#save').attr('disabled',true);
    })
  });
});
</script>

<!-- script for getting auto complete of data anggota -->
<script>
$(document).ready(function(){
  $('#id_anggota').keyup(function(){
    var query = $(this).val();
    if(query != '') {
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url:"{{ route('autoanggota') }}",
        method:"POST",
        data:{query:query, _token:_token},
        success:function(data){
          $('#anggota_list').fadeIn();
          $('#anggota_list').html(data);
        },
        error: function(e) {
          console.log('Error!', e);
        }
      });
    }
  });
  $(document).on('click', 'li.user', function(){
    $('#id_anggota').val($(this).text());
    $('#anggota_list').fadeOut();
    $('#save').attr('disabled',false);
  });
});
</script>

<!-- script for getting auto complete of data buku -->
<script>
$(document).ready(function(){
  $('#id_kodebuku1').keyup(function(){
    var query = $(this).val();
    if(query != '') {
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url:"{{ route('autobuku') }}",
        method:"POST",
        data:{query:query, _token:_token},
        success:function(data){
          $('#buku_list1').fadeIn();
          $('#buku_list1').html(data);
        },
        error: function(e) {
          console.log('Error!', e);
        }
      });
    }
  });
  $(document).on('click', 'li.buku', function(){
    $('#id_kodebuku1').val($(this).text());
    $('#buku_list1').fadeOut();
  });
});
</script>
@stop
