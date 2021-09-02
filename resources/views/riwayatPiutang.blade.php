@extends('layouts.sidenav')

@section('container')
    <div class="container">
        <div class="mt-4 mb-4">
            <h6><b>Riwayat Piutang</b></h6>
        </div>
        <div class="table-responsive mt-2">
            <table id="riwayat" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>No. </th>
                    <th>Peminjam</th>
                    <th>Nominal</th>
                    <th>Sudah Terbayar</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($credits as $key => $credit)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $credit->borrower }}</td>
                        <td>Rp {{ number_format($credit->nominal, 2, ',', '.') }}</td>
                        <td>Rp {{ number_format($credit->paid, 2, ',', '.') }}</td>
                        <td>{{ $credit->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
