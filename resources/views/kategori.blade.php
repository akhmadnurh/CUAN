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
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal"
            data-bs-whatever="@getbootstrap">Tambah data</button>
        <table id="kategori" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $key => $cat)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $cat->category_name }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal"
                            data-bs-whatever="@getbootstrap">Edit</button>
                        <a href="{{ url('remove-category').'/'.$cat->category_id }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal Tambah Data --}}

    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('add-category') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kategori" class="col-form-label">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="category" required>
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


    {{-- Modal Edit Data --}}

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kategori" class="col-form-label">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="category" value="" required>
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

@endsection
