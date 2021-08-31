@extends('layouts.main')

@section('container')
<div class="col-lg-4 form text-center">
    <h5>Verifikasi Akun</h5>
    <p class="mt-5">Masukkan Kode OTP</p>
    <form action="{{ url('verify-account') }}" method="post">
        @csrf
        <div id="divOuter">
            <div id="divInner">
                <input id="partitioned" type="text" maxlength="4" name="token" required
                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                       onKeyPress="if(this.value.length==4) return false;"/>
            </div>
        </div>

        <div class="mt-2">
            <small class="text-secondary">*Kode OTP telah dikirim ke email anda</small>
        </div>

        <div class="mt-5">
            <button type="submit" class="btn">Kirim</button>
        </div>
    </form>
</div>
@endsection
