@extends('layouts.sidenav')
@section('container')

    <div class="container">
        @if(session()->has('status'))
            <div
                class="alert {{ session()->get('status') == 'success' ? 'alert-success' : 'alert-danger' }} alert-dismissible fade show"
                role="alert">
                {{session()->get('msg')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row row-cols-1 row-cols-md-3">
            <div class="col pt-4">
                <div class="card h-100">
                    <div class="card-body p-4" id="total">
                        <h5 class="card-title">Saldo : </h5>
                        <h5 class="card-title">Rp. @{{ csrf_token($total) }} ,-</h5>
                    </div>
                    <div class="card-footer">
                        <small>More Info</small>
                    </div>
            </div>
        </div>
        <div class="col pt-4">
            <div class="card h-100">
                <div class="card-body p-4" id="hutang">
                    <h5 class="card-title">Hutang : </h5>
                    <h5 class="card-title">Rp. 0,-</h5>
                </div>
                <div class="card-footer">
                    <small>More Info</small>
                </div>
            </div>
        </div>
        <div class="col pt-4">
            <div class="card h-100">
                <div class="card-body p-4" id="piutang">
                    <h5 class="card-title">Piutang : </h5>
                    <h5 class="card-title">Rp 0,- </h5>
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
                <form action="{{ url('add-mutation') }}" method="post">
                    @csrf
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
                                    @foreach($types as $type)
                                        <option value="{{ $type->type_id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg mb-3">
                                <label for="recipient-name" class="col-form-label">Kategori</label>
                                <select name="category" id="" class="form-select" required>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->category_id }}">{{ $cat->category_name }}</option>
                                    @endforeach
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

    <div class="mt-5">
        <h6><b>Riwayat Terakhir</b></h6>
    </div>
    <div class="table-responsive mt-2">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Keterangan</th>
                    <th>Kategori</th>
                    <th>Waktu</th>
                    <th>Tanggal Transaksi</th>
                    <th>Total</th>
                    <th>Jenis Transaksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($histories as $key => $transaction)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ $transaction->category_name }}</td>
                    <td>{{ $transaction->time }}</td>
                    <td>{{ $transaction->date }}</td>
                    <td>Rp {{ number_format($transaction->total, 2, ',', '.') }}</td>
                    <td>{{ $transaction->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
