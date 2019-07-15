@extends('admin.template')

@section('main')
<div id="contoh">
  <div class="panel box-shadow-none content-header">
   <div class="panel-body">
     <div class="col-md-12">
         <h3 class="animated fadeInLeft">Dashboard</h3>
         <p class="animated fadeInDown">
           Selamat Datang di Sistem Peminjaman Buku Perpustakaan
         </p>
     </div>
   </div>
</div>
<div class="panel">
  <div class="panel-heading"><h3>Apa yang Dapat Dilakukan Petugas?</h3></div>
  <div class="panel-body">
    <div class="col-md-12">
      <ul class="timeline">
        <li>
          <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Mengelola Data Master</h4>
            </div>
            <div class="timeline-body">
              <p>Data master meliputi data rak, data kategori, data penerbit, data penulis, dan data buku. Data-data tersebut dapat dikelola meliputi membuat data baru, memperbarui data yang sudah ada, maupun menghapus data tersebut.</p>
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-badge info"><i class="glyphicon glyphicon-user"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Mengelola Akun</h4>
            </div>
            <div class="timeline-body">
              <p>Petugas dapat mengelola akun untuk anggota dan petugas. Akun petugas dibuat untuk petugas sebagai admin sistem. Sedangkan akun anggota dibuat untuk anggota perpustakaan yang dapat meminjam buku perpustakaan. Peminjam wajib memiliki akun yang dibuatkan oleh petugas melalui sistem ini.</p>
            </div>
          </div>
        </li>
        <li>
          <div class="timeline-badge danger"><i class="glyphicon glyphicon-credit-card"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Mengelola Data Peminjaman</h4>
            </div>
            <div class="timeline-body">
              <p>Peminjaman yang dilakukan oleh anggota, dicatat pada sistem ini sebagai data peminjaman buku. Pengelolaan data peminjaman ini dilakukan oleh petugas.</p>
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Mengelola Data Pengembalian</h4>
            </div>
            <div class="timeline-body">
              <p>Pengembalian yang dilakukan oleh anggota, dicatat pada sistem ini sebagai data pengembalian buku. Pengelolaan data pengembalian ini dilakukan oleh petugas.</p>
            </div>
          </div>
        </li>
        <li>
          <div class="timeline-badge info"><i class="glyphicon glyphicon-floppy-disk"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Laporan</h4>
            </div>
            <div class="timeline-body">
              <p>Petugas dapat mencetak laporan sebagai data yang dapat dilaporankan dalam suatu periode. Petugas dapat mencetak laporan yang meliputi laporan tentang anggota, laporan petugas, laporan buku, laporan peminjaman, dan laporan pengembalian.</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

@stop
