@extends('admin.template')

@section('main')
  <!-- menampilkan data -->
  <div class="panel box-shadow-none content-header"></div>
  <div class="col-md-12 top-20 padding-0">
   <div class="col-md-12">
     <div class="panel">
       <div class="panel-heading"><h3>Data Rak</h3></div>
         <div class="panel-body">
           <a class="btn btn-round btn-primary" data-target="#add" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a><br><br>
           <div class="responsive-table">
           <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
           <thead>
             <tr>
               <th>ID Rak</th>
               <th>Nama Rak</th>
               <th>Aksi</th>
             </tr>
           </thead>
           <tbody>
             @foreach ($list_rak as $rak)
             <tr class="data-row">
               <td class="align-middle iteration">{{ $rak->id_rak }}</td>
               <td class="align-middle name">{{ $rak->nama_rak }}</td>
               <td>
                 <div class="row">
                   <div class="col-sm-2">
                     <button type="button" class="btn btn-info" id="show-item" data-item-id="{{ $rak->id_rak }}">show</button>
                   </div>
                   <div class="col-sm-2">
                     <button type="button" class="btn btn-warning" id="edit-item" data-item-id="{{ $rak->id_rak }}">edit</button>
                   </div>
                   <div class="col-sm-2" onclick="return confirm('Yakin Akan Menghapus?')">
                     {!! Form::open(['method' => 'DELETE', 'action' => ['RakController@destroy', $rak->id_rak], 'id'=>'delete']) !!}
                     {!! Form::button('Hapus', ['type'=>'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                     {!! Form::close() !!}
                   </div>
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

  <!-- tambah data -->
  <!-- modal form tambah data -->
  <div class="col-md-12">
    <div class="modal fade" id="add">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Tambah Data</h4>
          </div>
          <div class="modal-body">
            {!! Form::open(['url' => 'admin/rak']) !!}

            @if ($errors->any())
              <div class="form-group {{ $errors->has('nama_rak') ? 'has-error' : 'has-success'}}">
            @else
              <div class="form-group">
                @endif
                {!! Form::text('nama_rak', null, ['class' => 'form-control', 'placeholder' => 'Nama Rak']) !!}

                @if ($errors->has('nama_rak'))
                <script>
                  $(document).ready(function(){
                    $('#add').modal({show: true});
                  });
                </script>
                  <span class="help-block">{{ $errors->first('nama_rak') }}</span>
                @endif
              </div>
          </div>
            <div class="modal-footer">
              {!! Form::button('Tutup', ['type' => 'button', 'class' => 'btn btn-default', 'data-dismiss' => 'modal'] )  !!}
              {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- end modal -->

  <!-- edit data -->
  <div class="col-md-12">
    <div class="modal fade" id="edit-modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Edit Data</h4>
          </div>
          <div class="modal-body">
            {!! Form::model($rak, ['method' => 'PATCH', 'action' => ['RakController@update', $rak->id_rak], 'enctype' => 'multipart/form-data', 'id'=>'edit-form']) !!}

            @if ($errors->any())
              <div class="form-group {{ $errors->has('update_nama_rak') ? 'has-error' : 'has-success'}}">
            @else
              <div class="form-group">
                @endif
                {!! Form::text('update_nama_rak', null, ['class' => 'form-control', 'placeholder' => 'Nama Rak', 'id' => 'modal-input-name']) !!}

                @if ($errors->has('update_nama_rak'))
                  <span class="help-block" id="error-edit">{{ $errors->first('update_nama_rak') }}</span>
                  <script>
                    $(document).ready(function(){
                      $('#edit-modal').modal({show: true});
                    });
                  </script>
                @endif
              </div>
          </div>
            <div class="modal-footer">
              {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>

  <script type="text/javascript">
      $(document).ready(function() {

        $(document).on('click', "#edit-item", function() {
          $(this).addClass('edit-item-trigger-clicked');

          var options = {
            'backdrop': 'static'
          };
          $('#edit-modal').modal(options)
        })

        // on modal show
        $('#edit-modal').on('show.bs.modal', function() {
          var el = $(".edit-item-trigger-clicked");
          var row = el.closest(".data-row");

          // get the data
          var id = el.data('item-id');
          var ids = row.children('.iteration').text();
          var nama = row.children(".name").text();

          // fill the data in the input fields
          $("#modal-input-name").val(nama);
          $("#edit-form").attr("action", "/admin/rak/"+ids);
        })

        $('#edit-modal').on('hide.bs.modal', function() {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
            $("#edit-form").trigger("reset");
            $("#error-edit").trigger("reset");
        })
      })
  </script>
  <!-- end edit -->

  <!-- show data -->
    <div class="col-md-12">
      <div class="modal fade" id="show-modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Show Data</h4>
            </div>
            <div class="modal-body">
              <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <tr id="show-id">
                  <td><b>ID RAK</b></td>
                  <td class="modal-show-id"></td>
                </tr>
                <tr id="show-namarak">
                  <td><b>Nama Rak</b></td>
                  <td class="modal-show-name"></td>
                </tr>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
      $(document).ready(function() {

        $(document).on('click', "#show-item", function() {
          $(this).addClass('edit-item-trigger-clicked');

          var options = {
            'backdrop': 'static'
          };
          $('#show-modal').modal(options)
        })

        // on modal show
        $('#show-modal').on('show.bs.modal', function() {

          var el = $(".edit-item-trigger-clicked");
          var row = el.closest(".data-row");

          // get the data
          // var id = el.data('item-id');
          var ids = row.children('.iteration').text();
          var nama = row.children(".name").text();

          // fill the data in the input fields
          $("#show-id").find('.modal-show-id').html(ids);
          $("#show-namarak").find('.modal-show-name').html(nama);
        })

        $('#show-modal').on('hide.bs.modal', function() {
              $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
              // $("#edit-form").trigger("reset");
              $("#show-id").find('.modal-show-id').trigger("reset");
              $("#show-namarak").find('.modal-show-name').trigger("reset");
        })
      })
  </script>
  <!-- end show -->
@stop
