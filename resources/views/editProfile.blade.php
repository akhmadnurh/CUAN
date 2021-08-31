@extends('layouts.sidenav')

@section('container')
<div class="container">
    <h6>Edit Profile</h6>
    <ul class="list-group w-50">
        <li class="list-group-item"><i class="fs-3 bi-person-circle mr-2"></i> Jojon</li>
        <li class="list-group-item">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </li>
        <li class="list-group-item">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </li>
        <li class="list-group-item">
            <label for="noHp">No Hp</label>
            <input type="number" class="form-control" id="noHp" name="noHp">
        </li>
        <button type="submit" class="btn btn-primary">Submit</button>
    </ul>
</div>
@endsection
