<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;

use App\Helpers\Log;

use App\User;

use Hash;

use Auth;

class PetugasController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index()
    {
        $list_petugas = User::where('role', 'petugas')->where('deleted', '0')->get();
        return view('admin/akun/petugas/index', compact('list_petugas'));
    }

    public function create()
    {
        return view('admin/akun/petugas/create');
    }

    public function store(UserRequest $request)
    {
        $ids = User::where('id', 'like', '%'.'PTG'.'%')->max('id');
        $ids == null ? $ids = 0 : $ids;
        $ids = (int) substr($ids, 3, 4);
        $ids++;
        $id = "PTG" . sprintf("%04s", $ids);

        $input = $request->all();
        $input['id']      = $id;
        $input['role']    = 'petugas';
        $input['password'] = Hash::make($input['password']);

        User::create($input);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'tambah petugas');
        return redirect('admin/petugas');
    }

    public function edit($id)
    {
        $petugas = User::findOrFail($id);
        return view('admin/akun/petugas/edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $petugas = User::findOrFail($id);
        $input = $request->all();
        
        if(empty($request['password'])) {
          $input = array_except($input, ['password']);
        } else {
          $input['password'] = Hash::make($input['password']);
        }

        $petugas->update($input);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'update petugas');
        return redirect('/admin/petugas');
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
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'hapus petugas');
        return redirect('admin/petugas');
    }
}
