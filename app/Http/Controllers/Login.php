<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\models\Admin;
use App\models\Staf_slrt;
use App\models\Pegawai;

class Login extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $request->session()->flash('failed', 'Lengkapi isian form');
            return redirect('login');
        }

        $hashedPassword = md5($request->password);

        $pegawai = Pegawai::where([
            'email' => $request->email,
            'password' => $hashedPassword,
        ]);

        $check = $this->checkUser($request, $pegawai, 'pegawai');
        if ($check != null) {
            return $check;
        }

        $staf_slrt = Staf_slrt::where([
            'email' => $request->email,
            'password' => $hashedPassword,
        ]);

        $check = $this->checkUser($request, $staf_slrt, 'staf-slrt');
        if ($check != null) {
            return $check;
        }

        $admin = Admin::where([
            'email' => $request->email,
            'password' => $hashedPassword,
        ]);

        $check = $this->checkUser($request, $admin, 'admin');
        if ($check != null) {
            return $check;
        }

        return redirect('/')->with('failed', 'Data User Tidak Ditemukan');
    }

    private function checkUser($request, $user, $role)
    {
        if ($user->exists()) {
            $user = $user->first()->toArray();
            unset($user['password']);
            $user['role'] = $role;
            $user['nama'] = $user['nama_admin'] ?? $user['nama_staf_slrt'] ?? $user['nama_pegawai'];
            Session(['user' => $user]);
            switch ($role) {
                case 'pegawai':
                    return redirect('/pegawai/home');
                case 'staf-slrt':
                    return redirect('/staf-slrt/home');
                case 'admin':
                    return redirect('/admin/home');
                default:
                    return redirect('/')->with('failed', 'Data User Tidak Ditemukan');
            }
        } else {
            return null;
        }
    }

    public function logout_action()
    {
        Session::flush();
        return redirect('/login');
    }
}
