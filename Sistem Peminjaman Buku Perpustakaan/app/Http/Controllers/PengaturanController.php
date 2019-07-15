<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pengaturan;

use App\Helpers\Log;

use Auth;

use Validator;

class PengaturanController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index()
    {
        $pengaturans = Pengaturan::get();
        return view('admin/pengaturan/index', compact('pengaturans'));
    }

    public function edit($id)
    {
        $data = Pengaturan::findOrFail($id);
        return view('admin/pengaturan/edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $pengaturan = Pengaturan::findOrFail($id);
        $input = $request->all();
        $validasi = Validator::make($input, [
          'ket' => 'required',
        ]);
        if($validasi->fails()) {
            return redirect('admin/pengaturan/'.$id.'/edit')
            ->withInput()
            ->withErrors($validasi);
        }

        $pengaturan->update($input);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'update pengaturan - '.$id);
        return redirect('/admin/pengaturan');
    }

}
