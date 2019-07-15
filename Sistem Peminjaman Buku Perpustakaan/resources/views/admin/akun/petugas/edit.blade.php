@extends('admin.template')

@section('main')
<!-- tambah data -->
<div class="panel box-shadow-none content-header">
<div class="panel-body">
  <div class="col-md-12">
    <h3 class="animated fadeInLeft">Petugas</h3>
    <p class="animated fadeInDown">
     Akun <span class="fa-angle-right fa"></span> Petugas
    </p>
  </div>
</div>
</div>
<div class="form-element">
<div class="col-md-12 padding-0">
  <div class="col-md-12">
    <div class="panel form-element-padding">
      <div class="panel-heading">
       <h4>Form Edit Petugas</h4>
      </div>
      <div class="panel-body" style="padding-bottom:30px;">
        {!! Form::model($petugas, ['method' => 'PATCH', 'action' => ['PetugasController@update', $petugas->id], 'enctype' => 'multipart/form-data']) !!}
          <div class="col-md-12">

            @include('admin/akun/petugas/form');

          </div>
        {!! Form::close() !!}          
       </div>
      </div>
    </div>
  </div>
</div>
</div>

@stop
