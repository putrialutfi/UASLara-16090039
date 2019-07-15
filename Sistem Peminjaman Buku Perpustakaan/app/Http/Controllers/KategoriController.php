<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kategori;

use App\Helpers\Log;

use Auth;

use Validator;

class KategoriController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index()
    {
        $list_kategori = Kategori::orderBy('created_at', 'desc')->get();
        return view('admin/data_master/data_kategori/index', compact('list_kategori'));
    }

    public function store(Request $request)
    {
        $ids = Kategori::max('id_kategori');
        $ids == null ? $ids = 0 : $ids;
        $ids = (int) substr($ids, 3, 3);
        $ids++;
        $id = "KTG" . sprintf("%03s", $ids);

        $input = $request->all();
        $input['id_kategori'] = $id;

        //validasi
        $validasi = Validator::make($input, [
          'nama_kategori' => 'required|max:100|unique:kategori,nama_kategori',
        ]);
        if($validasi->fails()) {
            return redirect('admin/kategori')
            ->withInput()
            ->withErrors($validasi);
        }

        Kategori::create($input);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'tambah kategori');
        return redirect('admin/kategori');
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $input = $request->all();

        //validasi
        $validasi = Validator::make($input, [
          'update_nama_kategori' => 'required|max:100|unique:kategori,nama_kategori',
        ]);
        if($validasi->fails()) {
            return redirect('admin/kategori')
            ->withInput()
            ->withErrors($validasi);
        }

        $input['nama_kategori'] = $request['update_nama_kategori'];
        $kategori->update($input);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'update kategori');
        return redirect('admin/kategori');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'hapus kategori');
        return redirect('admin/kategori');
    }
}
