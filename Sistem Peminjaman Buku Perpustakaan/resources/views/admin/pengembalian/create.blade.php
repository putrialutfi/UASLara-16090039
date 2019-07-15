@extends('admin.template')

@section('main')

  <!-- form tambah data -->
  <div class="panel box-shadow-none content-header">
   <div class="panel-body">
     <div class="col-md-12">
         <h3 class="animated fadeInLeft">Pengembalian Buku</h3>
         <p class="animated fadeInDown">
           Pengembalian <span class="fa-angle-right fa"></span> Pengembalian Buku
         </p>
     </div>
   </div>
  </div>
  <div class="form-element">
  <div class="col-md-12 padding-0">
    <div class="col-md-12">
      <div class="panel form-element-padding">
        <div class="panel-heading">
         <h4>Form Pengembalian Buku</h4>
        </div>
         <div class="panel-body" style="padding-bottom:30px;">
            <div class="col-md-12">

              {!! Form::open(['method'=>'post', 'url' => '/admin/pengembalian/buku']) !!}
              <div class="form-group col-sm-6">
                {!! Form::label('kode_buku', 'Kode Peminjaman :', ['class'=> 'col-sm-4 control-label text-right']) !!}
                <div class="col-sm-6">
                  {!! Form::text('kode_peminjaman', null, ['class' => 'form-control']) !!}
                </div>
                <div class="input-group-btn">
\                  {!! Form::button('<span class="fa fa-search">&nbsp;</span>', ['type'=>'submit', 'class' => 'btn btn-primary btn-md']) !!}
                  {!! Form::close() !!}
                </div>
              </div>
            </div>

            <div class="col-md-12">
              @if(isset($list_pinjam))
              <table class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Kode Peminjaman</th>
                    <th>Nama Anggota</th>
                    <th>Tgl. Pinjam</th>
                    <th>Tgl. Kembali</th>
                    <th>Buku</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($list_pinjam as $pinjam)
                  <tr>
                    <td>{{ $pinjam->kode_peminjaman }}</td>
                    <td>{{ $pinjam->anggotaUserPinjam->name }}</td>
                    <td>{{ $pinjam->tgl_pinjam->format('d M Y') }}</td>
                    <td>{{ $pinjam->tgl_kembali->format('d M Y') }}</td>
                    <td>{{ $pinjam->buku->judul_buku }}</td>
                    @if($pinjam->status == '1')
                    <td>Dipinjam</td>
                    @else
                    <td>Kembali</td>
                    @endif
                    <td>
                     <div class="col-md-6">
                        {!! Form::open(['method' => 'patch', 'url'=>'/admin/pengembalian/kembali/'.$pinjam->id]) !!}
                        {!! Form::button('Kembali ', ['type'=>'submit', 'class' => 'btn btn-primary btn-md']) !!}
                        {!! Form::close() !!}
                     </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @endif
            </div>

          </div>


          <br>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
