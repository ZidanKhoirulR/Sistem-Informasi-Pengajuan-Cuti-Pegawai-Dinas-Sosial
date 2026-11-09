@extends('template')

@section('title', '- Manage Pegawai')

@section('konten')
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Manage Pegawai</h4>
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
                <a href="/{{ optional(Session::get('user'))['role'] }}/manage-pegawai/create" title="Tambah Pegawai">
                    <button class="btn btn-primary"
                        style="width: auto; padding: 5px 10px; margin: 10px 0; border-radius: 5px;">
                        <i class="fas fa-user-plus"></i> Tambah Pegawai
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Data Pegawai</h3>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped" style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr style="border-bottom: 2px solid #dee2e6;">
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">No</th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Nama</th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Email</th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Tanggal Lahir
                                </th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Posisi</th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawai as $index => $item)
                                <tr>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $index + 1 }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $item->nama_pegawai }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $item->email }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $item->tanggal_lahir }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $item->posisi }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        <a href="/{{ optional(Session::get('user'))['role'] }}/manage-pegawai/{{ $item->id_pegawai }}/edit"
                                            class="btn btn-warning">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <form method="POST"
                                            action="/{{ optional(Session::get('user'))['role'] }}/manage-pegawai/{{ $item->id_pegawai }}"
                                            style="display:inline;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
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