<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Log;

use App\Penulis;

use Validator;

use Auth;

class PenulisController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index()
    {
        $list_penulis = Penulis::orderBy('created_at', 'desc')->get();
        return view('admin/data_master/data_penulis/index', compact('list_penulis'));
    }

    public function store(Request $request)
    {
        $ids = Penulis::max('id_penulis');
        $ids == null ? $ids = 0 : $ids;
        $ids = (int) substr($ids, 3, 3);
        $ids++;
        $id = "PNL" . sprintf("%03s", $ids);

        $input = $request->all();
        $input['id_penulis'] = $id;

        //validasi
        $validasi = Validator::make($input, [
          'nama_penulis' => 'required|max:100|unique:penulis,nama_penulis',
        ]);
        if($validasi->fails()) {
            return redirect('admin/penulis')
            ->withInput()
            ->withErrors($validasi);
      }

      Penulis::create($input);
      Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'tambah penulis');
      return redirect('admin/penulis');
    }

    public function update(Request $request, $id)
    {
        $penulis = Penulis::findOrFail($id);
        $input = $request->all();

        //validasi
        $validasi = Validator::make($input, [
          'update_nama_penulis' => 'required|max:100|unique:penulis,nama_penulis',
        ]);
        if($validasi->fails()) {
            return redirect('admin/penulis')
            ->withInput()
            ->withErrors($validasi);
        }

        $input['nama_penulis'] = $request['update_nama_penulis'];
        $penulis->update($input);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'update penulis');
        return redirect('admin/penulis');
    }

    public function destroy($id)
    {
        $penulis = Penulis::findOrFail($id);
        $penulis->delete();
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'hapus penulis');
        return redirect('admin/penulis');
    }
}
