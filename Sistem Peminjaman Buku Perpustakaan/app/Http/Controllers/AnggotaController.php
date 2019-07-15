<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;

use App\Helpers\Log;

use App\User;

use Auth;

use Hash;

class AnggotaController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index()
    {
        $list_anggota = User::where('role', 'anggota')->where('deleted', '0')->get();
        return view('admin/akun/anggota/index', compact('list_anggota'));
    }

    public function create()
    {
        return view('admin/akun/anggota/create');
    }

    public function store(UserRequest $request)
    {
        $ids = User::where('id', 'like', '%'.'AGT'.'%')->max('id');
        $ids == null ? $ids = 0 : $ids;
        $ids = (int) substr($ids, 3, 4);
        $ids++;
        $id = "AGT" . sprintf("%04s", $ids);

        $input = $request->all();
        $input['id']      = $id;
        $input['role']    = 'anggota';
        $input['password'] = Hash::make($input['password']);
        $input['created_by'] = Auth::user()->id;

        User::create($input);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'tambah anggota');
        return redirect('admin/anggota');
    }

    public function edit($id)
    {
        $anggota = User::findOrFail($id);
        return view('admin/akun/anggota/edit', compact('anggota'));
    }

    public function update(UserRequest $request, $id)
    {
        $anggota = User::findOrFail($id);
        $input = $request->all();
        if(empty($request['password'])) {
          $input = array_except($input, ['password']);
        } else {
          $input['password'] = Hash::make($input['password']);
        }
        $input['updated_by'] = Auth::user()->id;

        $anggota->update($input);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'update anggota');
        return redirect('/admin/anggota');
    }

    public function destroy($id)
    {
        $delete = User::findOrFail($id);
        $update = [
          'no_telp'  => 'deleted - '. $delete['no_telp'],
          'email'    => 'deleted - '. $delete['email'],
          'username' => 'deleted - '. $delete['username'],
          'deleted'  => '1'
        ];
        $delete->update($update);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'hapus anggota');
        return redirect('admin/anggota');
    }
}
