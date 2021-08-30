@extends('layouts.sidenav')

@section('container')
<div class="container">
    <div class="row row-cols-1 row-cols-md-3">
        <div class="col mt-4">
            <div class="card h-100">
                <div class="card-body p-4">
                    <h5 class="card-title">Saldo : </h5>
                    <h5 class="card-title">Rp 100.000,- </h5>
                </div>
                <div class="card-footer">
                    <small>More Info</small>
                </div>
            </div>
        </div>
        <div class="col mt-4">
            <div class="card h-100">
                <div class="card-body p-4">
                    <h5 class="card-title">Hutang : </h5>
                    <h5 class="card-title">Rp 100.000,- </h5>
                </div>
                <div class="card-footer">
                    <small>More Info</small>
                </div>
            </div>
        </div>
        <div class="col mt-4">
            <div class="card h-100">
                <div class="card-body p-4">
                    <h5 class="card-title">Piutang : </h5>
                    <h5 class="card-title">Rp 100.000,- </h5>
                </div>
                <div class="card-footer">
                    <small>More Info</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
