@extends('admin.template')

@section('main')
  <!-- form tambah data buku -->
  <div class="panel box-shadow-none content-header">
   <div class="panel-body">
     <div class="col-md-12">
         <h3 class="animated fadeInLeft">Pengaturan</h3>
         <p class="animated fadeInDown">
           Edit Pengaturan <span class="fa-angle-right fa"></span> Pengaturan
         </p>
     </div>
   </div>
  </div>
  <div class="form-element">
  <div class="col-md-12 padding-0">
    <div class="col-md-12">
      <div class="panel form-element-padding">
        <div class="panel-heading">
         <h4>Form Edit Pengaturan</h4>
        </div>
        <div class="panel-body" style="padding-bottom:30px;">
          {!! Form::model($data, ['method' => 'PATCH', 'action' => ['PengaturanController@update', $data->id], 'enctype' => 'multipart/form-data']) !!}
		        <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="col-md-12">

              @if(isset($data))
              	{!! Form::hidden('id', $data->id) !!}
              @endif

              @if ($errors->any())
                <div class="form-group {{ $errors->has('ket') ? 'has-error' : 'has-success'}}">
              @else
                <div class="form-group">
                  @endif
                  {!! Form::label('ket', 'Keterangan : ', ['class' => 'col-sm-2 control-label text-right']) !!}
                  <div class="col-sm-10">
                    {!! Form::text('ket', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('ket'))
                      <span class="help-block">{{ $errors->first('ket') }}</span>
                    @endif
                  </div>
                </div>

              {!! Form::submit('Simpan', ['class' => 'btn btn-gradient btn-primary center-block', 'style' => 'margin-top: 30px;']) !!}

            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- end form tambah data -->

@stop
