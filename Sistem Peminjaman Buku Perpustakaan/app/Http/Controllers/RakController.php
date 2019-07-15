<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Log;

use App\Rak;

use Validator;

use Auth;

class RakController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index()
    {
        $list_rak = Rak::orderBy('created_at', 'desc')->get();
        return view('admin/data_master/data_rak/index', compact('list_rak'));
    }

    public function store(Request $request)
    {
        $ids = Rak::max('id_rak');
        $ids == null ? $ids = 0 : $ids;
        $ids = (int) substr($ids, 3, 3);
        $ids++;
        $id = "RAK" . sprintf("%03s", $ids);

        $input = $request->all();
        $input['id_rak'] = $id;

        //validasi
        $validasi = Validator::make($input, [
          'nama_rak' => 'required|max:100|unique:rak,nama_rak',
        ]);
        if($validasi->fails()) {
            return redirect('admin/rak')
            ->withInput()
            ->withErrors($validasi);
        }

        Rak::create($input);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'tambah rak');
        return redirect('admin/rak');
    }

    public function update(Request $request, $id)
    {
        $rak = Rak::findOrFail($id);
        $input = $request->all();

        //validasi
        $validasi = Validator::make($input, [
          'update_nama_rak' => 'required|max:100|unique:rak,nama_rak',
        ]);
        if($validasi->fails()) {
            return redirect('admin/rak')
            ->withInput()
            ->withErrors($validasi);
        }

        $input['nama_rak'] = $request['update_nama_rak'];
        $rak->update($input);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'update rak');
        return redirect('admin/rak');
    }

    public function destroy($id)
    {
        $rak = Rak::findOrFail($id);
        $rak->delete();
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'hapus rak');
        return redirect('admin/rak');
    }
}
