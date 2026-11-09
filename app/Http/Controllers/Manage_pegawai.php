<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Pegawai;

class Manage_pegawai extends Controller
{
    public function index()
    {
        $data['pegawai'] = Pegawai::all();
        return view('manage_pegawai', $data);
    }

    public function create()
    {
        return view('form_pegawai');
    }

    public function store(Request $request)
    {
        if (Pegawai::create($request->all())) {
            return redirect(Session('user')['role'] . '/manage-pegawai')->with('success', 'Berhasil membuat pegawai');
        } else {
            return redirect(Session('user')['role'] . '/manage-pegawai')->with('failed', 'Gagal membuat pegawai');
        }
    }

    public function edit(Request $request)
    {
        $data['pegawai'] = Pegawai::where([
            'id_pegawai' => $request->segment(3)
        ])->first();
        return view('form_pegawai', $data);
    }

    public function update(Request $request)
    {
        $pegawai = Pegawai::where([
            'id_pegawai' => $request->segment(3)
        ])->first();
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->email = $request->email;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->posisi = $request->posisi;

        if ($pegawai->save()) {
            return redirect(Session('user')['role'] . '/manage-pegawai')->with('success', 'Berhasil memperbarui pegawai');
        } else {
            return redirect(Session('user')['role'] . '/manage-pegawai')->with('failed', 'Gagal memperbarui pegawai');
        }
    }

    public function show()
    {

    }

    public function destroy(Request $request)
    {
        $pegawai = Pegawai::find($request->segment(3));
        if ($pegawai->delete()) {
            return redirect(Session('user')['role'] . '/manage-pegawai')->with('success', 'Berhasil menghapus pegawai');
        } else {
            return redirect(Session('user')['role'] . '/manage-pegawai')->with('failed', 'Gagal menghapus pegawai');
        }
    }
}
