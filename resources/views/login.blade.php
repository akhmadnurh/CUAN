@extends('layouts.main')

@section('container')
<div class="col-lg-4 form">
    <ul class="nav justify-content-center mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login"
                type="button" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-register-tab" data-bs-toggle="pill" data-bs-target="#pills-register"
                type="button" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
            <h6 class="text-center mt-4 mb-4 text-black-50">Login</h6>
            <form>
                <div class="form-group">
                    <label for="inputAddress">Email</label>
                    <input type="text" class="form-control" id="inputAddress">
                </div>
                <div class="form-group mt-3">
                    <label for="inputAddress">Password</label>
                    <input type="password" class="form-control" id="inputAddress">
                </div>
                <div class="mt-5">
                    <button type="button" class="btn">Login</button>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
            <h6 class="text-center mt-4 mb-4 text-black-50">Register</h6>
            <form>
                <div class="row g-3">
                    <div class="col-md">
                        <label>Nama Depan</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md">
                        <label>Nama Belakang</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="inputAddress">Email</label>
                    <input type="email" class="form-control" id="inputAddress">
                </div>
                <div class="form-group mt-3">
                    <label for="inputAddress">Password</label>
                    <input type="password" class="form-control" id="inputAddress">
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
