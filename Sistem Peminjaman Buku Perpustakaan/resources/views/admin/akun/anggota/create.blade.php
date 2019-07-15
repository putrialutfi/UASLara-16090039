@extends('admin.template')

@section('main')

<!-- form tambah anggota -->
<div class="panel box-shadow-none content-header">
<div class="panel-body">
 <div class="col-md-12">
   <h3 class="animated fadeInLeft">Anggota</h3>
   <p class="animated fadeInDown">
     Akun <span class="fa-angle-right fa"></span> Anggota
   </p>
 </div>
</div>
</div>
<div class="form-element">
<div class="col-md-12 padding-0">
  <div class="col-md-12">
    <div class="panel form-element-padding">
      <div class="panel-heading">
       <h4>Form Tambah Anggota</h4>
      </div>
      <div class="panel-body" style="padding-bottom:30px;">
        {!! Form::open(['url' => 'admin/anggota']) !!}
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="col-md-12">

          @include('admin/akun/anggota/form');

        </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
</div>

@stop
