@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">User Admin Dashboard</h3>
            <div class="mb-3">
                <a href="admin/create" class="btn btn-success text-white shadow-none"><i class="fa-brands fa-readme"></i>&nbsp;&nbsp;Tambah User</a>
            </div>
            <form>
                <label class="form-label">Filter Data</label>
                <div class="mb-3">
                    <input type="text" class="form-control pencarian" name="pencarian" placeholder="Pencarian" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-secondary text-white shadow-none" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;&nbsp;Cari</button>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">Tabel User</h3>
            <div class="table-responsive">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        <i class="fa-solid fa-circle-check"></i>&nbsp;&nbsp;{{ session('success') }}
                    </div>
                @endif
                @if(session()->has('delete'))
                    <div class="alert alert-warning">
                        <i class="fa-solid fa-circle-check"></i>&nbsp;&nbsp;{{ session('delete') }}
                    </div>
                @endif
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                                <td>
                                    <a href="admin/edit/{{ $item->id }}" class="btn btn-primary shadow-none">Edit</a>
                                    <a href="admin/delete/{{ $item->id }}" class="btn btn-danger shadow-none">Hapus</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $user->links() }}
</div>

@endsection
