<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\View_sisa_cuti;
use App\models\Pengajuan_cuti;
use App\models\Pegawai;
use App\models\Staf_slrt;

class Home extends Controller
{
    public function index(Request $request)
    {
        $role = Session('user')['role'];
        switch ($role) {
            case 'pegawai':
                # code...
                return $this->index_pegawai($request);
                break;
            case 'staf-slrt':
                # code...
                return $this->index_staf_slrt($request);
                break;
            case 'admin':
                # code...
                return $this->index_admin($request);
                break;

            default:
                # code...
                return redirect('/login');
                break;
        }
    }

    private function index_pegawai($request)
    {
        $id_pegawai = Session('user')['id_pegawai'];
        $sisa_cuti = View_sisa_cuti::where([
            'id_pegawai' => $id_pegawai,
            'tahun' => date('Y')
        ])
            ->first();
        $pengajuan_cuti_verifikasi = pengajuan_cuti::where([
            'id_pegawai' => $id_pegawai,
            'status' => 'verifikasi'
        ])
            ->where('tanggal_pengajuan', 'like', date('Y') . "%")
            ->count();
        $total_pengajuan_cuti = pengajuan_cuti::where([
            'id_pegawai' => $id_pegawai,
        ])
            ->where('tanggal_pengajuan', 'like', date('Y') . "%")
            ->count();
        $data['cuti_terpakai'] = $sisa_cuti->cuti_terpakai;
        $data['sisa_cuti'] = $sisa_cuti->sisa_cuti;
        $data['pengajuan_cuti_verifikasi'] = $pengajuan_cuti_verifikasi;
        $data['total_pengajuan_cuti'] = $total_pengajuan_cuti;
        return view('home_pegawai', $data);
    }

    private function index_staf_slrt($request)
    {
        $jumlah_pegawai = Pegawai::count();
        $pengajuan_cuti_verifikasi = pengajuan_cuti::where([
            'status' => 'verifikasi'
        ])
            ->where('tanggal_pengajuan', 'like', date('Y') . "%")
            ->count();
        $total_pengajuan_cuti = pengajuan_cuti::where('tanggal_pengajuan', 'like', date('Y') . "%")->count();
        $data['jumlah_pegawai'] = $jumlah_pegawai;
        $data['pengajuan_cuti_verifikasi'] = $pengajuan_cuti_verifikasi;
        $data['total_pengajuan_cuti'] = $total_pengajuan_cuti;
        return view('home_staf_slrt', $data);
    }

    private function index_admin($request)
    {
        $jumlah_pegawai = Pegawai::count();
        $jumlah_staf_slrt = Staf_slrt::count();
        $pengajuan_cuti_verifikasi = pengajuan_cuti::where([
            'status' => 'verifikasi'
        ])
            ->where('tanggal_pengajuan', 'like', date('Y') . "%")
            ->count();
        $total_pengajuan_cuti = pengajuan_cuti::
            where('tanggal_pengajuan', 'like', date('Y') . "%")
            ->count();
        $data['jumlah_pegawai'] = $jumlah_pegawai;
        $data['jumlah_staf_slrt'] = $jumlah_staf_slrt;
        $data['pengajuan_cuti_verifikasi'] = $pengajuan_cuti_verifikasi;
        $data['total_pengajuan_cuti'] = $total_pengajuan_cuti;
        return view('home_admin', $data);
    }
}
