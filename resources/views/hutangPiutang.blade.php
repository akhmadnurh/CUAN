@extends('layouts.sidenav')

@section('container')
<div class="container">
    <div class="table-responsive mt-2">
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal"
            data-bs-target="#tambahHutangPiutangModal" data-bs-whatever="@getbootstrap">Tambah data</button>
        <table id="hutangPiutang" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Keterangan</th>
                    <th>Kategori</th>
                    <th>Waktu</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Jenis Transaksi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#bayarModal" data-bs-whatever="@getbootstrap">Bayar</button>
                        <button type="button" class="btn btn-secondary">Ikhlaskan</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="tambahHutangPiutangModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Hutang Piutang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nominal" class="col-form-label">Nominal</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp </span>
                                <input type="number" class="form-control" id="nominal" min="0" name="total" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg mb-3">
                                <label for="recipient-name" class="col-form-label">Jenis Transaksi</label>
                                <select name="mutation-type" id="" class="form-select" required>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-lg mb-3">
                                <label for="recipient-name" class="col-form-label">Kategori</label>
                                <select name="category" id="" class="form-select" required>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg mb-3">
                                <label for="tanggal" class="col-form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="date" required>
                            </div>
                            <div class="col-lg mb-3">
                                <label for="waktu" class="col-form-label">Waktu</label>
                                <input type="time" class="form-control" id="waktu" name="time" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="catatan" class="col-form-label">Catatan/Keterangan:</label>
                            <textarea class="form-control" id="catatan" name="description" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bayarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bayar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div>
                            <p>
                                Jumlah Transaksi : 
                                <br>
                                Rp. 150.000
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label">Jumlah Bayar</label>
                            <input type="number" class="form-control" id="" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
