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
            <form action="{{ url('login') }}" method="POST">
                @csrf
                @if(session()->has('status'))
                    <div id="alert">
                        <div
                            class="alert {{ session()->get('status') == 'error' ? 'alert-danger' : 'alert-success' }}">{{ session()->get('msg') }}</div>

                    </div>
                @endif
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" maxlength="30" required
                           onfocus="removeAlert()">
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" maxlength="30" required
                           onfocus="removeAlert()">
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn">Login</button>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
            <h6 class="text-center mt-4 mb-4 text-black-50">Register</h6>
            <form action="{{ url('register') }}" method="post" onsubmit="return verifyPassword()">
                <div id="alert-register">
                </div>
                @csrf
                <div class="row g-3">
                    <div class="col-md">
                        <label for="firstname">Nama Depan</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" maxlength="30" required
                               onfocus="removeRegisterAlert()">
                    </div>
                    <div class="col-md">
                        <label for="lastname">Nama Belakang</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" maxlength="30" required
                               onfocus="removeRegisterAlert()">
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="emailRegister">Email</label>
                    <input type="email" class="form-control" id="emailRegister" name="emailRegister" maxlength="30"
                           required onfocus="removeRegisterAlert()">
                </div>
                <div class="form-group mt-3">
                    <label for="passwordRegister">Password</label>
                    <input type="password" class="form-control" id="passwordRegister" name="passwordRegister"
                           maxlength="30"
                           required onfocus="removeRegisterAlert()">
                </div>
                <div class="form-group mt-3">
                    <label for="passwordRegister">Ulangi Password</label>
                    <input type="password" class="form-control" id="passwordRegisterV" name="passwordRegisterV"
                           maxlength="30"
                           required onfocus="removeRegisterAlert()">
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const removeAlert = () => {
        const alert = document.getElementById('alert')
        alert.innerHTML = '<div></div>'
    }

    const removeRegisterAlert = () => {
        const alertRegister = document.getElementById('alert-register')
        alertRegister.innerHTML = '<div></div>'
    }

    const verifyPassword = () => {
        pwd = document.getElementById('passwordRegister').value
        pwdV = document.getElementById('passwordRegisterV').value
        alert = document.getElementById('alert-register')

        if (pwd !== pwdV) {
            alert.innerHTML = '<div class="alert alert-danger">Password tidak sesuai.</div>'
            return false
        } else {
            return true
        }
    }
</script>
@endsection
