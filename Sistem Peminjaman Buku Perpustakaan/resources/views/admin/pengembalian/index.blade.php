@extends('admin.template')

@section('main')
<!-- menampilkan data -->
<div class="panel box-shadow-none content-header"></div>
  <div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-heading">
          <h3>Data Pengembalian</h3>
        </div>
        <div class="panel-body">
          <!-- <a class="btn btn-round btn-primary" href="#"><i class="fa fa-print" aria-hidden="true"></i> Print </a> -->
          <br><br>
          <div class="responsive-table">
            <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Kode Pengembalian</th>
                  <th>Kode Peminjaman</th>
                  <th>Tgl. Pinjam</th>
                  <th>Tgl. Kembali</th>
                  <th>Tgl. Pengembalian</th>
                  <th>Buku</th>
                  <th>Denda</th>
                </tr>
              </thead>
              <tbody>
                @foreach($list_kembali as $kembali)
                <tr>
                  <td>{{ $kembali->kode_pengembalian }}</td>
                  <td>{{ $kembali->id_kodepeminjaman }}</td>
                  <td>{{ $kembali->peminjaman->tgl_pinjam->format('d M Y') }}</td>
                  <td>{{ $kembali->peminjaman->tgl_kembali->format('d M Y') }}</td>
                  <td>{{ $kembali->tgl_pengembalian->format('d M Y') }}</td>
                  <td>{{ $kembali->peminjaman->buku->judul_buku }}</td>
                  <td>{{ $kembali->denda }}</td>
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
