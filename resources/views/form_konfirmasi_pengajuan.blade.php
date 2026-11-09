@extends('template')

@section('title', '- Form Konfirmasi Pengajuan Cuti')

@section('konten')
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Form Pengajuan Cuti</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

        </div>
        <!-- /.col-lg-12 -->
    </div>

    @if (Request::segment(3) != 'create')
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Form Pengajuan Cuti</h3>
                    <hr>
                    <form class="form" action="/{{ Session('user')['role'] }}/manage-pengajuan-cuti/{{Request::segment(3)}}"
                        method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Nama Pegawai</label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="{{$pengajuan_cuti->nama_pegawai}}"
                                    id="example-text-input" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-2 col-form-label">Tanggal Pengajuan</label>
                            <div class="col-10">
                                <input class="form-control" type="date" value="{{$pengajuan_cuti->tanggal_pengajuan}}"
                                    id="example-email-input" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-2 col-form-label">Lama Cuti</label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="{{$pengajuan_cuti->lama_cuti}}"
                                    id="example-email-input" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Keterangan</label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="{{$pengajuan_cuti->keterangan}}"
                                    id="example-text-input" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-2 col-form-label">Status</label>
                            <div class="col-10">
                                <select name="status" class="form-control" id="" required>
                                    @if (Session::get('user')['role'] == 'staf-slrt')
                                        <option value="verifikasi" selected>verifikasi</option>
                                    @else
                                        <option value="verifikasi" {{ $pengajuan_cuti->status == 'verifikasi' ? 'selected' : '' }}>verifikasi</option>
                                        <option value="disetujui" {{ $pengajuan_cuti->status == 'disetujui' ? 'selected' : '' }}>
                                            disetujui</option>
                                        <option value="ditolak" {{ $pengajuan_cuti->status == 'ditolak' ? 'selected' : '' }}>
                                            ditolak</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-block" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    @endif

</div>
@endsection