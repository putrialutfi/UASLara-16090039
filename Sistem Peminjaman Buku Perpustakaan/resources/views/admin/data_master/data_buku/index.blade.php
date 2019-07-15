@extends('admin.template')

@section('main')

<!-- menampilkan data buku -->
<div class="panel box-shadow-none content-header"></div>
  <div class="col-md-12 top-20 padding-0">
   <div class="col-md-12">
     <div class="panel">
       <div class="panel-heading"><h3>Data Buku</h3></div>
         <div class="panel-body">
           <a class="btn btn-round btn-primary" href="{{ url('admin/buku/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
           <!-- <a class="btn btn-round btn-primary" hre f="#"><i class="fa fa-print"></i> Print </a> -->
           <br><br>
           <div class="responsive-table">
           <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
             <thead>
               <tr>
                 <th>Kode Buku</th>
                 <th>Judul Buku</th>
                 <th>Rak</th>
                 <th>Penulis</th>
                 <th>Kategori</th>
                 <th>Penerbit</th>
                 <th>Tahun</th>
                 <th>No. ISBN</th>
                 <th>Aksi</th>
               </tr>
             </thead>
             <tbody>
               @foreach($list_buku as $buku)
               <tr>
                 <td>{{ $buku->kode_buku }}</td>
                 <td>{{ $buku->judul_buku }}</td>
                 <td>{{ $buku->rak->nama_rak }}</td>
                 <td>{{ $buku->penulis->nama_penulis }}</td>
                 <td>{{ $buku->kategori->nama_kategori }}</td>
                 <td>{{ $buku->penerbit->nama_penerbit }}</td>
                 <td>{{ $buku->tahun }}</td>
                 <td>{{ $buku->no_isbn }}</td>
                 <td>
                   <div class="col-md-4">
                    {{ link_to('admin/buku/' . $buku->kode_buku . '/edit', 'Edit', ['class' => 'btn btn-warning  btn-sm']) }}
                  </div>
                  <div class="col-md-4" onclick="return confirm('Yakin Akan Menghapus?')">
                    {!! Form::open(['method' => 'DELETE', 'action' => ['BukuController@destroy', $buku->kode_buku], 'id' => 'delete']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                  </div>
                 </td>
               </tr>
               @endforeach
             </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- end menampilkan data -->
@stop
