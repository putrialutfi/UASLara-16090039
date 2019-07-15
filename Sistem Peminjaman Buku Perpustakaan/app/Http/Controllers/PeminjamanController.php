<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Log;

use App\Peminjaman;

use App\Pengaturan;

use App\Buku;

use App\User;

use Validator;

use Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $list_pinjam = Peminjaman::where('deleted', '0')->get();
        return view('admin/peminjaman/index', compact('list_pinjam'));
    }

    public function __construct(){
        $this->middleware('auth');

        $ids = Peminjaman::max('kode_peminjaman');
        $ids == null ? $ids = 0 : $ids;
        $ids = (int) substr($ids, 2, 3);
        $ids++;
        $id = "PJ" . sprintf("%03s", $ids);

        $this->now = now();
        $this->kode_peminjaman = $id;
        $tgl_kembali = (int) Pengaturan::where('id', 'tgl_kembali')->first()->ket;
        $this->tgl_kembali = now()->addDays($tgl_kembali);
    }

    public function create()
    {
        $id = $this->kode_peminjaman;
        $tgl_kembali = $this->tgl_kembali;
        return view('admin/peminjaman/create', compact('id', 'tgl_kembali'));
    }

    public function store(Request $request)
    {
            $input = $request->all();
            $id_kodebuku = $request->id_kodebuku;
            $anggota     = substr($input['id_anggota'], 0, 7);
            $input['id_anggota'] = $anggota;
            for($count = 0; $count < count($id_kodebuku); $count++) {
              $input['id_kodebuku'][$count] = substr($id_kodebuku[$count], 0, 5);
            }

            //validasi
            $validasi = Validator::make($input, [
              'id_anggota' => 'required|exists:users,id',
              'id_kodebuku.*' => 'required|exists:buku,kode_buku',
            ]);
            if($validasi->fails()) {
                return redirect('admin/peminjaman/create')
                ->withInput()
                ->withErrors($validasi);
            }

            for($count = 0; $count < count($id_kodebuku); $count++)
            {
                $data = array(
                 'kode_peminjaman' => $this->kode_peminjaman,
                 'tgl_pinjam'      => $this->now,
                 'tgl_kembali'     => $this->tgl_kembali,
                 'id_anggota'      => $anggota,
                 'id_kodebuku'     => $input['id_kodebuku'][$count],
                 'status'          => '1',
                 'id_petugas'      => Auth::user()->id,
                 'deleted'         => '0',
                 'created_by'      => Auth::user()->id,
                 'updated_by'      => null
                );
                Peminjaman::create($data);
            }
            Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'tambah peminjaman');
            return redirect('/admin/peminjaman');
    }

    public function getAnggota(Request $request)
    {
          if($request->get('query')) {
            $query = $request->get('query');
            $data = User::where('role', 'anggota')->where('deleted', '0')
                    ->where('name', 'LIKE', '%'.$query.'%')->get();
            $output = '<ul class="dropdown-menu col-sm-12" style="display:block; position:relative">';
            foreach($data as $row) {
              $output .= '
              <li class="user"><a href="#">'.$row->id. " - ".$row->name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
          }
    }

    public function getBuku(Request $request)
    {
          if($request->get('query')) {
            $query = $request->get('query');
            $count = $request->get('count');
            $data = Buku::where('judul_buku', 'LIKE', '%'.$query.'%')->where('deleted', '0')->get();
            $output = '<ul class="dropdown-menu col-sm-12" style="display:block; position:relative">';
            foreach($data as $row) {
              $output .= '
              <li class="buku'.$count.'"><a href="#">'.$row->kode_buku. " - ".$row->judul_buku.'</a></li>';            }
            $output .= '</ul>';
            echo $output;
          }
    }

    public function edit($id)
    {
        $pinjam = Peminjaman::findOrFail($id);
        return view('admin/peminjaman/edit', compact('pinjam'));
    }

    public function update(Request $request, $id)
    {
        $pinjam = Peminjaman::findOrFail($id);
        $input = $request->all();

        $id_kodebuku = $request->id_kodebuku;
        $anggota     = substr($input['id_anggota'], 0, 7);
        $input['id_anggota'] = $anggota;

        for($count = 0; $count < count($id_kodebuku); $count++) {
          $input['id_kodebuku'][$count] = substr($id_kodebuku[$count], 0, 5);
        }

        //validasi
        $validasi = Validator::make($input, [
          'id_anggota' => 'required|exists:users,id',
          'id_kodebuku.*' => 'required|exists:buku,kode_buku',
        ]);
        if($validasi->fails()) {
            return redirect('admin/peminjaman/create')
            ->withInput()
            ->withErrors($validasi);
        }

        if(count($id_kodebuku) > 1) {
          for($count = 1; $count < count($id_kodebuku); $count++)
          {
              $data = array(
               'kode_peminjaman' => $pinjam['kode_peminjaman'],
               'tgl_pinjam'      => $pinjam['tgl_pinjam'],
               'tgl_kembali'     => $pinjam['tgl_kembali'],
               'id_anggota'      => $anggota,
               'id_kodebuku'     => $input['id_kodebuku'][$count],
               'status'          => '1',
               'id_petugas'      => $pinjam['id_petugas'],
               'deleted'         => '0',
               'created_by'      => $pinjam['created_by'],
               'updated_by'      => Auth::user()->id
              );
              Peminjaman::create($data);
          }
        }

        $input['kode_peminjaman'] = $pinjam['kode_peminjaman'];
        $input['tgl_pinjam']  = $pinjam['tgl_pinjam'];
        $input['tgl_kembali']  = $pinjam['tgl_kembali'];
        $input['id_kodebuku']  = substr($id_kodebuku[0], 0, 5);

        $pinjam->update($input);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'update peminjaman');
        return redirect('/admin/peminjaman');
    }

    public function destroy($id)
    {
        $delete = Peminjaman::findOrFail($id);
        $update = [
          'deleted'  => '1'
        ];
        $delete->update($update);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'hapus peminjaman');
        return redirect('admin/peminjaman');
    }
}
