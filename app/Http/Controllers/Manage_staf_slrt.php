<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Staf_slrt;

class Manage_staf_slrt extends Controller
{
    public function index()
    {
        $data['staf_slrt'] = Staf_slrt::all();
        return view('manage_staf_slrt', $data);
    }

    public function create()
    {
        return view('form_staf_slrt');
    }

    public function store(Request $request)
    {
        if (Staf_slrt::create($request->all())) {
            return redirect(Session('user')['role'] . '/manage-staf-slrt')->with('success', 'Berhasil membuat staf SLRT');
        } else {
            return redirect(Session('user')['role'] . '/manage-staf-slrt')->with('failed', 'Gagal membuat staf SLRT');
        }
    }

    public function edit(Request $request)
    {
        $data['staf_slrt'] = Staf_slrt::where([
            'id_staf_slrt' => $request->segment(3)
        ])->first();
        return view('form_staf_slrt', $data);
    }

    public function update(Request $request)
    {
        $staf_slrt = Staf_slrt::where([
            'id_staf_slrt' => $request->segment(3)
        ])->first();
        $staf_slrt->nama_staf_slrt = $request->nama_staf_slrt;
        $staf_slrt->email = $request->email;
        if ($staf_slrt->save()) {
            return redirect(Session('user')['role'] . '/manage-staf-slrt')->with('success', 'Berhasil memperbarui staf SLRT');
        } else {
            return redirect(Session('user')['role'] . '/manage-staf-slrt')->with('failed', 'Gagal memperbarui staf SLRT');
        }
    }

    public function show()
    {

    }

    public function destroy(Request $request)
    {
        $staf_slrt = Staf_slrt::find($request->segment(3));
        if ($staf_slrt->delete()) {
            return redirect(Session('user')['role'] . '/manage-staf-slrt')->with('success', 'Berhasil menghapus staf SLRT');
        } else {
            return redirect(Session('user')['role'] . '/manage-staf-slrt')->with('failed', 'Gagal menghapus staf SLRT');
        }
    }
}
