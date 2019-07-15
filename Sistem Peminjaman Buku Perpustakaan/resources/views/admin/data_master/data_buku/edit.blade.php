@extends('admin.template')

@section('main')
  <!-- form tambah data buku -->
  <div class="panel box-shadow-none content-header">
   <div class="panel-body">
     <div class="col-md-12">
         <h3 class="animated fadeInLeft">Buku</h3>
         <p class="animated fadeInDown">
           Edit Buku <span class="fa-angle-right fa"></span> Buku
         </p>
     </div>
   </div>
  </div>
  <div class="form-element">
  <div class="col-md-12 padding-0">
    <div class="col-md-12">
      <div class="panel form-element-padding">
        <div class="panel-heading">
         <h4>Form Edit Buku</h4>
        </div>
        <div class="panel-body" style="padding-bottom:30px;">
          {!! Form::model($buku, ['method' => 'PATCH', 'action' => ['BukuController@update', $buku->kode_buku], 'enctype' => 'multipart/form-data']) !!}
		        <input type="hidden" name="_token" value="{{csrf_token()}}">
            
            <div class="col-md-12">

              @include('admin/data_master/data_buku/form');

            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- end form tambah data -->

@stop
