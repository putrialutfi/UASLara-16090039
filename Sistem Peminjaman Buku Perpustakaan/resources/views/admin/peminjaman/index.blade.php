@extends('admin.template')

@section('main')
  <!-- menampilkan data -->
  <div class="panel box-shadow-none content-header"></div>
    <div class="col-md-12 top-20 padding-0">
      <div class="col-md-12">
        <div class="panel">
          <div class="panel-heading">
            <h3>Data Peminjaman</h3>
          </div>
          <div class="panel-body">
            <!-- <a class="btn btn-round btn-primary" href="#"><i class="fa fa-print" aria-hidden="true"></i> Print </a> -->
            <br><br>
              <div class="responsive-table">
              <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
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
                      <div class="col-md-4">
                       {{ link_to('admin/peminjaman/' . $pinjam->id . '/edit', 'Edit', ['class' => 'btn btn-warning  btn-sm']) }}
                     </div>
                     <div class="col-md-6" onclick="return confirm('Yakin Akan Menghapus?')">
                       {!! Form::open(['method' => 'DELETE', 'action' => ['PeminjamanController@destroy', $pinjam->id]]) !!}
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
