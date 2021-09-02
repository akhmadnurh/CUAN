@extends('layouts.sidenav')

@section('container')
<div class="container">
    @if(session()->has('status'))
        <div class="alert {{ session()->get('status') == 'success' ? 'alert-success' : 'alert-danger' }} alert-dismissible fade show"
             role="alert">
            {{session()->get('msg')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="table-responsive mt-2">
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal"
                data-bs-target="#tambahHutangPiutangModal" data-bs-whatever="@getbootstrap">Tambah data
        </button>
        <table id="hutangPiutang" class="display" style="width:100%">
            <thead>
            <tr>
                <th>No.</th>
                <th>Peminjam</th>
                <th>Jenis</th>
                <th>Nominal</th>
                <th>Sudah Terbayar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($credits as $key => $credit)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $credit->borrower }}</td>
                    <td>{{ $credit->type_name }}</td>
                    <td>Rp {{ number_format($credit->nominal, 2, ',', '.') }}</td>
                    <td>Rp {{ number_format($credit->paid, 2, ',', '.') }}</td>
                    <td>{{ $credit->status }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#bayarModal" data-bs-whatever="@getbootstrap"
                                onclick="pay('{{ $credit->debt_id }}', '{{ number_format($credit->nominal, 2, ",", ".") }}')">
                            Bayar
                        </button>
                        <a href="{{ url('sincere').'/'.$credit->debt_id }}" class="btn btn-secondary">Ikhlaskan</a>
                    </td>
                </tr>
            @endforeach
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
                    <form action="{{ url('add-debt-credit') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="col-lg mb-3">
                                <label for="recipient-name" class="col-form-label">Jenis</label>
                                <select name="mutation-type" id="" class="form-select" required>
                                    @foreach($types as $type)
                                        <option value="{{ $type->type_id }}">{{ $type->type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nominal" class="col-form-label">Peminjam/Meminjam</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="borrower" name="borrower" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nominal" class="col-form-label">Nominal</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp </span>
                                <input type="number" class="form-control" id="nominal" min="0" name="total" required>
                            </div>
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
                    <form action="{{ url('pay-debt-credit') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div>
                                <p>
                                    Jumlah Transaksi :
                                    <br>
                                    Rp <span id="total">0</span>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Jumlah Bayar</label>
                                <input type="number" class="form-control" id="nominal" min="0" name="nominal" required>
                                <input type="hidden" class="form-control" id="debt-id" name="debt-id" required>
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
<script>
    const pay = (id, total) => {
        document.getElementById('debt-id').value = id
        document.getElementById('total').innerText = total
    }
</script>
@endsection

