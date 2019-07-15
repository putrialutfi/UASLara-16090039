@extends('admin.template')

@section('main')
  <!-- menampilkan data petugas -->
  <div class="panel box-shadow-none content-header"></div>
  <div class="col-md-12 top-20 padding-0">
   <div class="col-md-12">
     <div class="panel">
       <div class="panel-heading"><h3>Data Petugas</h3></div>
         <div class="panel-body">
           <a class="btn btn-round btn-primary" href="{{ url('admin/petugas/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a><br><br>
           <div class="responsive-table">
           <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
             <thead>
               <tr>
                 <th>ID Anggota</th>
                 <th>Nama Anggota</th>
                 <th>TTL</th>
                 <th>Email</th>
                 <th>No Telp</th>
                 <th>Alamat</th>
                 <th>Username</th>
                 <th>Aksi</th>
               </tr>
             </thead>
             <tbody>
               @foreach($list_petugas as $petugas)
               <tr>
                 <td>{{ $petugas->id }}</td>
                 <td>{{ $petugas->name }}</td>
                 <td>{{ $petugas->tempat_lahir }}, {{ $petugas->tanggal_lahir->format('d M Y') }}</td>
                 <td>{{ $petugas->email }}</td>
                 <td>{{ $petugas->no_telp }}</td>
                 <td>{{ $petugas->alamat }}</td>
                 <td>{{ $petugas->username }}</td>
                 <td>
                   <div class="col-md-6">
                    {{ link_to('admin/petugas/' . $petugas->id . '/edit', 'Edit', ['class' => 'btn btn-warning  btn-sm']) }}
                  </div>
                  <div class="col-md-6" onclick="return confirm('Yakin Akan Menghapus?')">
                    {!! Form::open(['method' => 'DELETE', 'action' => ['PetugasController@destroy', $petugas->id]]) !!}
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
