@extends('template')

@section('title', '- Manage Pengajuan Cuti')

@section('konten')
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title" Pengajuan Cuti</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('failed'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('failed') }}
                </div>
            @endif
        </div>
    </div>
    <!-- /row -->
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                @if ($role == 'pegawai')
                    <a href="/{{ optional(Session::get('user'))['role'] }}/manage-pengajuan-cuti/create"
                        title="Tambah Pengajuan Cuti">
                        <button class="btn btn-primary"
                            style="width: auto; padding: 5px 10px; margin: 10px 0; border-radius: 5px;">
                            <i class="fas fa-user-plus"></i> Ambil Cuti
                        </button>
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Data Pengajuan Cuti</h3>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped" style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr style="border-bottom: 2px solid #dee2e6;">
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">No</th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Nama Pegawai
                                </th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Tanggal
                                    Pengajuan</th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Lama Cuti</th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Keterangan</th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Status</th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Verifikasi Oleh
                                </th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengajuan_cuti as $index => $item)
                                <tr>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $index + 1 }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $item->nama_pegawai }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $item->tanggal_pengajuan }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $item->lama_cuti }} hari
                                    </td>
                                    <td style="border:  1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $item->keterangan }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $item->status }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $item->verifikasi_oleh }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        @if (in_array($role, ['staf-slrt', 'admin']))
                                            <a href="/{{ optional(Session::get('user'))['role'] }}/manage-pengajuan-cuti/{{$item->id_pengajuan_cuti}}/edit"
                                                title="Edit Pengajuan Cuti" class="btn btn-warning">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a>
                                        @endif
                                        @if ($item->status == 'verifikasi')
                                            <form method="POST"
                                                action="/{{ optional(Session::get('user'))['role'] }}/manage-pengajuan-cuti/{{$item->id_pengajuan_cuti}}"
                                                style="display:inline;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this item?');">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection