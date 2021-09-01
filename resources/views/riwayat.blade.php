@extends('layouts.sidenav')

@section('container')
<div class="container">
    <div class="mt-5">
        <h6><b>Riwayat Terakhir</b></h6>
    </div>
    <div class="table-responsive mt-2">
        <table id="riwayat" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Keterangan</th>
                    <th>Waktu</th>
                    <th>Tanggal Transaksi</th>
                    <th>Jumlah</th>
                    <th>Kategori</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>menalangi kekurangan seminar</td>
                    <td>19.00</td>
                    <td>27 Februari 2021</td>
                    <td>250.000</td>
                    <td>Piutang</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>






@endsection
