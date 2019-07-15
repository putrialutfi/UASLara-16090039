@extends('admin.template')

@section('main')

<!-- menampilkan data buku -->
<div class="panel box-shadow-none content-header"></div>
  <div class="col-md-12 top-20 padding-0">
   <div class="col-md-12">
     <div class="panel">
       <div class="panel-heading"><h3>Pengaturan</h3></div>
         <div class="panel-body">
           <div class="responsive-table">
           <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
             <thead>
               <tr>
                 <th>Hal</th>
                 <th>Keterangan</th>
                 <th>Aksi</th>
               </tr>
             </thead>
             <tbody>
               @foreach($pengaturans as $data)
               <tr>
                 @if($data->id == 'tgl_kembali')
                   <td>Lama Pengembalian (Hari)</td>
                   @else
                   <td>Denda</td>
                 @endif
                <td>{{ $data->ket }}</td>
                 <td>
                   <div class="col-md-4">
                    {{ link_to('admin/pengaturan/' . $data->id . '/edit', 'Edit', ['class' => 'btn btn-warning  btn-sm']) }}
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
