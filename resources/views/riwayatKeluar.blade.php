@extends('layouts.sidenav')

@section('container')
    <div class="container">
        <div class="mt-4 mb-4">
            <h6><b>Riwayat Transaksi Keluar</b></h6>
        </div>
        <div class="table-responsive mt-2">
            <table id="riwayat" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>No. </th>
                    <th>Keterangan</th>
                    <th>Kategori</th>
                    <th>Waktu</th>
                    <th>Tanggal Transaksi</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transactions as $key => $transaction)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $transaction->description }}</td>
                        <td>{{ $transaction->category_name }}</td>
                        <td>{{ $transaction->time }}</td>
                        <td>{{ $transaction->date }}</td>
                        <td>Rp {{ number_format($transaction->total, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
