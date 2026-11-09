@extends('template')

@section('title', '- Konfigurasi Cuti')

@section('konten')
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Konfigurasi Cuti</h4>
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
                <a href="/{{ Session('user')['role'] }}/konfigurasi-cuti/create" title="Tambah Konfigurasi Cuti">
                    <button class="btn btn-primary"
                        style="width: auto; padding: 5px 10px; margin: 10px 0; border-radius: 5px;">
                        <i class="fas fa-plus-circle"></i> Tambah Cuti
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Data Konfigurasi Cuti</h3>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped" style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr style="border-bottom: 2px solid #dee2e6;">
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">No</th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Tahun</th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Jumlah Cuti
                                </th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($konfigurasi_cuti as $index => $item)
                                <tr>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $index + 1 }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $item->tahun }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $item->jumlah_cuti }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        <a href="/{{ Session('user')['role'] }}/konfigurasi-cuti/{{$item->id_konfig_cuti}}/edit"
                                            class="btn btn-warning">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <form method="POST"
                                            action="/{{ Session('user')['role'] }}/konfigurasi-cuti/{{$item->id_konfig_cuti}}"
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