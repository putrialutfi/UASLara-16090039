<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Penerbit;

use App\Helpers\Log;

use Auth;

use Validator;

class PenerbitController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index()
    {
        $list_penerbit = Penerbit::orderBy('created_at', 'desc')->get();
        return view('admin/data_master/data_penerbit/index', compact('list_penerbit'));
    }

    public function store(Request $request)
    {
        $ids = Penerbit::max('id_penerbit');
        $ids == null ? $ids = 0 : $ids;
        $ids = (int) substr($ids, 3, 3);
        $ids++;
        $id = "PNB" . sprintf("%03s", $ids);

        $input = $request->all();
        $input['id_penerbit'] = $id;

        //validasi
        $validasi = Validator::make($input, [
          'nama_penerbit' => 'required|max:100|unique:penerbit,nama_penerbit',
        ]);
        if($validasi->fails()) {
            return redirect('admin/penerbit')
            ->withInput()
            ->withErrors($validasi);
        }

        Penerbit::create($input);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'tambah penerbit');
        return redirect('admin/penerbit');
    }

    public function update(Request $request, $id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $input = $request->all();

        //validasi
        $validasi = Validator::make($input, [
          'update_nama_penerbit' => 'required|max:100|unique:penerbit,nama_penerbit',
        ]);
        if($validasi->fails()) {
            return redirect('admin/penerbit')
            ->withInput()
            ->withErrors($validasi);
        }

        $input['nama_penerbit'] = $request['update_nama_penerbit'];
        $penerbit->update($input);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'update penerbit');
        return redirect('admin/penerbit');
    }

    public function destroy($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'hapus penerbit');
        return redirect('admin/penerbit');
    }
}
