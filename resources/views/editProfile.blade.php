@extends('layouts.sidenav')

@section('container')
    <div class="container">
        <h6>Edit Profile</h6>
        <ul class="list-group w-50">
            <li class="list-group-item"><i class="fs-3 bi-person-circle mr-2"></i> Jojon</li>
            <form action="{{ url('edit-profile') }}" method="post">
                @csrf
                <li class="list-group-item">
                    <div class="row g-3">
                        <div class="col-md">
                            <label for="firstname">Nama Depan</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" maxlength="30"
                                   required value="{{ $data->firstname }}">
                        </div>
                        <div class="col-md">
                            <label for="lastname">Nama Belakang</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" maxlength="30"
                                   required value="{{ $data->lastname }}">
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group mt-3">
                        <label for="passwordRegister">Password</label>
                        <input type="password" class="form-control" id="password" name="password" maxlength="30"
                               required>
                    </div>
                </li>
                <li class="list-group-item">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </li>
            </form>
        </ul>
    </div>
@endsection
