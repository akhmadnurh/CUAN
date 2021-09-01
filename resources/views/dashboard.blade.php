@extends('layouts.sidenav')

@section('container')
<div class="container">
    <div class="row row-cols-1 row-cols-md-3">
        <div class="col pt-4">
            <div class="card h-100">
                <div class="card-body p-4">
                    <h6 class="card-title">Saldo : </h6>
                    <h5 class="card-title">Rp 100.000,- </h5>
                </div>
                <div class="card-footer">
                    <small>More Info</small>
                </div>
            </div>
        </div>
        <div class="col pt-4">
            <div class="card h-100">
                <div class="card-body p-4">
                    <h6 class="card-title">Hutang : </h6>
                    <h5 class="card-title">Rp 100.000,- </h5>
                </div>
                <div class="card-footer">
                    <small>More Info</small>
                </div>
            </div>
        </div>
        <div class="col pt-4">
            <div class="card h-100">
                <div class="card-body p-4">
                    <h6 class="card-title">Piutang : </h6>
                    <h5 class="card-title">Rp 100.000,- </h5>
                </div>
                <div class="card-footer">
                    <small>More Info</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 justify-content-center pt-4">
        <div class="col">
            <div class="card h-100 tambah" data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-bs-whatever="@getbootstrap">
                <div class="card-body p-4 text-center">
                    <h5 class="card-title">Tambah Catatan</h5>
                    <i class="fs-3 bi-plus-circle-fill"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Catatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nominal" class="col-form-label">Nominal</label>
                            <input type="number" class="form-control" id="nominal">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Kategori</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="col-form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal">
                        </div>
                        <div class="mb-3">
                            <label for="waktu" class="col-form-label">Waktu</label>
                            <input type="time" class="form-control" id="waktu">
                        </div>
                        <div class="mb-3">
                            <label for="catatan" class="col-form-label">Catatan/Keterangan:</label>
                            <textarea class="form-control" id="catatan"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h6><b>Riwayat Terakhir</b></h6>
    </div>
    <div class="table-responsive mt-2">
        <table id="example" class="display" style="width:100%">
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
