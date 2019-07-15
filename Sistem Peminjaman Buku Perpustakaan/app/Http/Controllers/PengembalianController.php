<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Log;

use App\Peminjaman;

use App\Pengembalian;

use App\Pengaturan;

use Carbon\Carbon;

use Auth;

class PengembalianController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index()
    {
        $list_kembali = Pengembalian::all();
        return view('admin/pengembalian/index', compact('list_kembali'));
    }

    public function create()
    {
        return view('admin/pengembalian/create');
    }

    public function getkode(Request $request)
    {
        $kode_peminjaman = $request->kode_peminjaman;
        $list_pinjam = Peminjaman::where('kode_peminjaman', $kode_peminjaman)->get();
        return view('admin/pengembalian/create', compact('list_pinjam'));
    }

    public function kembali($id)
    {
        $data = Peminjaman::findOrFail($id);

        $ids = Pengembalian::max('kode_pengembalian');
        $ids == null ? $ids = 0 : $ids;
        $ids = (int) substr($ids, 3, 3);
        $ids++;
        $id = "KMB" . sprintf("%03s", $ids);
        $nominal = Pengaturan::where('id', 'denda')->first()->ket;

        $kembali['kode_pengembalian'] = $id;
        $kembali['id_kodepeminjaman'] = $data['kode_peminjaman'];
        $kembali['tgl_pengembalian']  = now();
        $days = Carbon::parse($data['tgl_kembali'])->diffInDays(Carbon::parse(now()), false);
        $days < 1 ? $kembali['denda'] = '0' : $kembali['denda'] = $days*$nominal;
        $kembali['id_kodepetugas'] = Auth::user()->id;
        Pengembalian::create($kembali);

        $data->update([
          'status' => '0'
        ]);
        Log::instance()->log(empty(Auth::user()->id) ? null : Auth::user(), 'kembalikan buku');
        return redirect('/admin/pengembalian');
    }

}
