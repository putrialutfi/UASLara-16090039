@extends('admin.template')

@section('main')
  <!-- tampilkan data anggota -->
  <div class="panel box-shadow-none content-header"></div>
  <div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-heading"><h3>Data Anggota</h3></div>
          <div class="panel-body">
            <a class="btn btn-round btn-primary" href="{{ url('admin/anggota/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a><br><br>
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
                  <th>Status</th>
                  <th>Tanggal Daftar</th>
                  <th>Username</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($list_anggota as $anggota)
                <tr>
                  <td>{{ $anggota->id }}</td>
                  <td>{{ $anggota->name }}</td>
                  <td>{{ $anggota->tempat_lahir }}, {{ $anggota->tanggal_lahir->format('d M Y') }}</td>
                  <td>{{ $anggota->email }}</td>
                  <td>{{ $anggota->no_telp }}</td>
                  <td>{{ $anggota->alamat }}</td>
                  @if($anggota->status == '1')
                  <td>Aktif</td>
                  @else
                  <td>Tidak Aktif</td>
                  @endif
                  <td>{{ $anggota->created_at }}</td>
                  <td>{{ $anggota->username }}</td>
                  <td>
                    <div class="col-md-6">
                     {{ link_to('admin/anggota/' . $anggota->id . '/edit', 'Edit', ['class' => 'btn btn-warning  btn-sm']) }}
                   </div>
                   <div class="col-md-6" onclick="return confirm('Yakin Akan Menghapus?')">
                     {!! Form::open(['method' => 'DELETE', 'action' => ['AnggotaController@destroy', $anggota->id]]) !!}
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
  <!-- end tampilkan data -->

@stop
