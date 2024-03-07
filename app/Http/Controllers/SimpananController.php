<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\TransaksiS;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SimpananController extends Controller
{
    public function index()
    {
        $data['user'] = User::all();
        $data['kategori'] = Jenis::select('jenis.*', 'kategori.*')
            ->join('kategori', 'jenis.id', '=', 'kategori.id_jenis')
            ->where('jenis.nama', '=', 'Simpanan')
            ->get();
        $data['simpanan'] = TransaksiS::with('user')->with('kategori')->get();
        return view('pages.simpanan', $data);
    }

    public function create(Request $req)
    {
        $req->validate([
            'id_user' => 'required',
            'id_kategori' => 'required',
            'nama_penyetor' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);
        TransaksiS::create([
            'id_user' => $req->id_user,
            'id_kategori' => $req->id_kategori,
            'nama_penyetor' => $req->nama_penyetor,
            'jumlah' => $req->jumlah,
            'tanggal' => $req->tanggal,
            'keterangan' => $req->keterangan,
        ]);
        return redirect('/simpanan');
    }
    public function edit(Request $req)
    {
        $req->validate([
            'id_user' => 'required',
            'id_kategori' => 'required',
            'nama_penyetor' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);
        TransaksiS::where('id', $req->id)->update([
            'id_user' => $req->id_user,
            'id_kategori' => $req->id_kategori,
            'nama_penyetor' => $req->nama_penyetor,
            'jumlah' => $req->jumlah,
            'tanggal' => $req->tanggal,
            'keterangan' => $req->keterangan,
        ]);
        return redirect('/simpanan');
    }

    public function delete($id)
    {
        $simpanan = TransaksiS::where('id', $id)->first();
        $simpanan->delete();
        return redirect('/simpanan');
    }

    public function getJumlah($id_user, $id_kat)
    {
        $users = User::where('id', $id_user)->first();
        return response()->json($users);
    }
}
