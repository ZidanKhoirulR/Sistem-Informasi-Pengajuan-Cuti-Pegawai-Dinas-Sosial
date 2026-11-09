@extends('template')

@section('title', '- Rekap Pengajuan Cuti')

@section('konten')
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Rekap Data Cuti</h4>
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
                <button class="btn btn-primary"
                    style="width: auto; padding: 5px 10px; margin: 10px 0; border-radius: 5px;"
                    onclick="printTable()">Cetak PDF
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Data Rekap Pengajuan Cuti</h3>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped" style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr style="border-bottom: 2px solid #dee2e6;">
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">No</th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Nama Pegawai
                                </th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Tahun</th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Jumlah Cuti
                                </th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Cuti Terpakai
                                </th>
                                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Sisa Cuti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sisa_cuti as $index => $item)
                                <tr>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $index + 1 }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $item->nama_pegawai }} <!-- Nama pegawai ditampilkan di sini -->
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $item->tahun }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $item->jumlah_cuti }} hari</i>
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $item->cuti_terpakai }}
                                    </td>
                                    <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                                        {{ $item->sisa_cuti }}
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
<!-- /.row -->

<!-- Script untuk cetak tabel -->
<script>
    function printTable() {
        var table = document.getElementById("myTable").outerHTML; // Ambil isi tabel
        var newWindow = window.open(""); // Buka jendela baru
        newWindow.document.write("<html><head><title>Cetak Rekap</title>");
        newWindow.document.write("<style>table {width: 100%; border-collapse: collapse;} th, td {border: 1px solid black; padding: 8px; text-align: left;}</style>"); // Tambahkan style untuk tabel saat cetak
        newWindow.document.write("</head><body>");
        newWindow.document.write(table); // Masukkan tabel ke dalam dokumen cetak
        newWindow.document.write("</body></html>");
        newWindow.document.close(); // Tutup dokumen
        newWindow.print(); // Cetak dokumen
    }
</script>

@endsection