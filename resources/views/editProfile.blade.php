@extends('layouts.sidenav')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-lg text-center" style="display: flex;justify-content: center;align-items:center">
            <div>
                <i class="bi-person-circle mr-2" style="font-size: 100px"></i>
                <h5>{{ session()->get('firstname').' '.session()->get('lastname') }}</h5>
                <h6>email</h6>
            </div>
        </div>
        <div class="col-lg">
            <h6 class="mt-3">Edit Profile</h6>
            <ul class="list-group mt-3 mb-3">
                <form action="{{ url('edit-profile') }}" method="post">
                    @csrf
                    <li class="list-group-item">
                        <div id="profile-alert">
                            @if(session()->has('profile-status'))
                            <div
                                class="alert {{ session()->get('profile-status') == 'success' ? 'alert-success' : 'alert-danger' }}">
                                {{ session()->get('profile-msg') }}</div>
                            @endif
                        </div>
                        <div class="row g-3">
                            <div class="col-md">
                                <label for="firstname">Nama Depan</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" maxlength="30"
                                    required value="{{ $data->firstname }}" onfocus="removeProfileAlert()">
                            </div>
                            <div class="col-md">
                                <label for="lastname">Nama Belakang</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" maxlength="30"
                                    required value="{{ $data->lastname }}" onfocus="removeProfileAlert()">
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </li>
                </form>
            </ul>
            <h6 class="mt-2">Ubah Password</h6>
            <ul class="list-group mt-3">
                <form action="{{ url('edit-password') }}" method="post" onsubmit="return verifyPassword()">
                    @csrf
                    <li class="list-group-item">
                        <div id="password-alert">
                            @if(session()->has('password-status'))
                            <div
                                class="alert {{ session()->get('password-status') == 'success' ? 'alert-success' : 'alert-danger' }}">
                                {{ session()->get('password-msg') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Password Lama</label>
                            <input type="password" class="form-control" id="passwordOld" name="passwordOld"
                                maxlength="30" required onfocus="removePasswordAlert()">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="">Password Baru</label>
                            <input type="password" class="form-control" id="passwordNew" name="passwordNew"
                                maxlength="30" required onfocus="removePasswordAlert()">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="passwordNewV" name="passwordNewV"
                                maxlength="30" required onfocus="removePasswordAlert()">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </li>
                </form>
            </ul>
        </div>
    </div>
</div>

<script>
    const removeProfileAlert = () => {
        let alert = document.getElementById('profile-alert')
        alert.innerHTML = ''
    }

    const removePasswordAlert = () => {
        let alert = document.getElementById('password-alert')
        alert.innerHTML = ''
    }

    const verifyPassword = () => {
        pwd = document.getElementById('passwordNew').value
        pwdV = document.getElementById('passwordNewV').value
        alert = document.getElementById('password-alert')

        if (pwd !== pwdV) {
            alert.innerHTML = '<div class="alert alert-danger">Password baru tidak cocok.</div>'
            return false
        } else {
            return true
        }
    }

</script>
@endsection
