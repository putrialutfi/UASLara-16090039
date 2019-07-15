<div id="left-menu">
  <div class="sub-left-menu scroll">
    <ul class="nav nav-list">
        <li><div class="left-bg"></div></li>
        <li class="risple">
          <a href="{{ url('/admin') }}"><span class="fa-home fa"></span> Dashboard</a>
        </li>
        <li class="ripple">
          <a class="tree-toggle nav-header">
            <span class="fa fa-book"></span> Peminjaman
            <span class="fa-angle-right fa right-arrow text-right"></span>
          </a>
          <ul class="nav nav-list tree">
            <li><a href="{{ url('admin/peminjaman/create') }}">Peminjaman Buku</a></li>
            <li><a href="{{ url('admin/peminjaman') }}">Data Peminjaman</a></li>
          </ul>
        </li>
        <li class="ripple">
          <a class="tree-toggle nav-header">
            <span class="fa fa-mail-reply"></span> Pengembalian
            <span class="fa-angle-right fa right-arrow text-right"></span>
          </a>
          <ul class="nav nav-list tree">
            <li><a href="{{ url('admin/pengembalian/create') }}">Pengembalian Buku</a></li>
            <li><a href="{{ url('admin/pengembalian') }}">Data Pengembalian</a></li>
          </ul>
        </li>
        <li class="ripple">
          <a class="tree-toggle nav-header">
            <span class="fa fa-user"></span> Akun
            <span class="fa-angle-right fa right-arrow text-right"></span>
          </a>
          <ul class="nav nav-list tree">
            <li><a href="{{ url('admin/anggota') }}">Anggota</a></li>
            <li><a href="{{ url('admin/petugas') }}">Petugas</a></li>
          </ul>
        </li>
        <li class="risple">
          <a href="{{ url('admin/buku') }}"><span class="fa-book fa"></span> Data Buku</a>
        </li>
        <li class="ripple">
          <a class="tree-toggle nav-header">
            <span class="fa fa-folder-open-o fa"></span> Master Data
            <span class="fa-angle-right fa right-arrow text-right"></span>
          </a>
          <ul class="nav nav-list tree">
            <li><a href="{{ url('admin/rak') }}">Data Rak</a></li>
            <li><a href="{{ url('admin/kategori') }}">Data Kategori</a></li>
            <li><a href="{{ url('admin/penerbit') }}">Data Penerbit</a></li>
            <li><a href="{{ url('admin/penulis') }}">Data Penulis</a></li>
          </ul>
        </li>
        <li class="risple">
          <a href="{{ url('admin/pengaturan') }}"><span class="fa-gear fa"></span> Pengaturan</a>
        </li>
      </ul>
    </div>
</div>
