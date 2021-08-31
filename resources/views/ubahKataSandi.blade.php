@extends('layouts.sidenav')

@section('container')
<div class="container">
    <h6>Ubah Kata Sandi</h6>
    <ul class="list-group w-50">
        <li class="list-group-item"><i class="fs-3 bi-person-circle mr-2"></i> Jojon</li>
        <li class="list-group-item">
            <label for="nama">Masukkan kata sandi anda saat ini</label>
            <input type="password" class="form-control" id="nama" name="nama">
        </li>
        <li class="list-group-item">
            <label for="email">Kata sandi baru</label>
            <input type="password" class="form-control" id="email" name="email">
        </li>
        <li class="list-group-item">
            <label for="noHp">Konfirmasi kata sandi baru</label>
            <input type="password" class="form-control" id="noHp" name="noHp">
        </li>
        <button type="submit" class="btn btn-primary">Submit</button>
    </ul>
</div>
@endsection
