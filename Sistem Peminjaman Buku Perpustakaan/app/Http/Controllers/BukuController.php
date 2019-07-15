<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Log;

use App\Rak;

use App\Kategori;

use App\Penulis;

use App\Penerbit;

use App\Buku;

use Validator;

use Auth;

class BukuController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index()
    {
          $list_buku = Buku::where('deleted', 1)->orderBy('created_at', 'desc')->get();
          return view('admin/data_master/data_buku/index', compact('list_buku'));
    }

    public function create()
    {
        return view('admin/data_master/data_buku/create');
    }

    public function store(Request $request)
    {
        $ids = Buku::max('kode_buku');
        $ids == null ? $ids = 0 : $ids;
        $ids = (int) substr($ids, 2, 3);
        $ids++;
        $id = "BK" . sprintf("%03s", $ids);

        $input = $request->all();
        $input['kode_buku'] = $id;
        $input['id_rak'] = substr($request->id_rak, 0, 6);
        $input['id_penulis'] = substr($request->id_penulis, 0, 6);
        $input['id_kategori'] = substr($request->id_kategori, 0, 6);
        $input['id_penerbit'] = substr($request->id_penerbit, 0, 6);
        $input['created_by'] = Auth::user()->id;

        //validasi
        $validasi = Validator::make($input, [
          'judul_buku'    => 'required|max:50|string',
          'id_rak'        => 'required|exists:rak,id_rak',
          'id_penulis'    => 'required|exists:penulis,id_penulis',
          'id_kategori'   => 'required|exists:kategori,id_kategori',
          'id_penerbit'   => 'required|exists:penerbit,id_penerbit',
          'tahun'         => 'required|date_format:Y',
          'no_isbn'       => 'required'
        ]);

        if($validasi->fails()) {
            return redirect('admin/buku/create')
            ->withInput()
            ->withErrors($validasi);
        }

        Buku::create($input);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'tambah buku');
        return redirect('/admin/buku');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('admin/data_master/data_buku/edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $input = $request->all();
        $input['id_rak'] = substr($request->id_rak, 0, 6);
        $input['id_penulis'] = substr($request->id_penulis, 0, 6);
        $input['id_kategori'] = substr($request->id_kategori, 0, 6);
        $input['id_penerbit'] = substr($request->id_penerbit, 0, 6);
        $input['updated_by'] = Auth::user()->id;

        //validasi
        $validasi = Validator::make($input, [
          'judul_buku'    => 'required|max:100|string',
          'id_rak'        => 'required|exists:rak,id_rak',
          'id_penulis'    => 'required|exists:penulis,id_penulis',
          'id_kategori'   => 'required|exists:kategori,id_kategori',
          'id_penerbit'   => 'required|exists:penerbit,id_penerbit',
          'tahun'         => 'required|date_format:Y',
          'no_isbn'       => 'required'
        ]);

        if($validasi->fails()) {
            return redirect('admin/buku/'.$id.'/edit')
            ->withInput()
            ->withErrors($validasi);
        }

        $buku->update($input);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'update buku');
        return redirect('admin/buku');
    }

    public function destroy($id)
    {
        $delete = Buku::findOrFail($id);
        $delete->update(['deleted' => '1']);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'hapus buku');
        return redirect('admin/buku');
    }

    public function getRak(Request $request)
    {
          if($request->get('query')) {
            $query = $request->get('query');
            $data = Rak::where('nama_rak', 'LIKE', '%'.$query.'%')->get();
            $output = '<ul class="dropdown-menu col-sm-12" style="display:block; position:relative">';
            foreach($data as $row) {
              $output .= '
              <li class="rak"><a href="#">'.$row->id_rak. " - ".$row->nama_rak.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
          }
    }

    public function getPenulis(Request $request)
    {
          if($request->get('query')) {
            $query = $request->get('query');
            $data = Penulis::where('nama_penulis', 'LIKE', '%'.$query.'%')->get();
            $output = '<ul class="dropdown-menu col-sm-12" style="display:block; position:relative">';
            foreach($data as $row) {
              $output .= '
              <li class="penulis"><a href="#">'.$row->id_penulis. " - ".$row->nama_penulis.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
          }
    }

    public function getKategori(Request $request)
    {
          if($request->get('query')) {
            $query = $request->get('query');
            $data = Kategori::where('nama_kategori', 'LIKE', '%'.$query.'%')->get();
            $output = '<ul class="dropdown-menu col-sm-12" style="display:block; position:relative">';
            foreach($data as $row) {
              $output .= '
              <li class="kategori"><a href="#">'.$row->id_kategori. " - ".$row->nama_kategori.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
          }
    }

    public function getPenerbit(Request $request)
    {
          if($request->get('query')) {
            $query = $request->get('query');
            $data = Penerbit::where('nama_penerbit', 'LIKE', '%'.$query.'%')->get();
            $output = '<ul class="dropdown-menu col-sm-12" style="display:block; position:relative">';
            foreach($data as $row) {
              $output .= '
              <li class="penerbit"><a href="#">'.$row->id_penerbit. " - ".$row->nama_penerbit.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
          }
    }
}
