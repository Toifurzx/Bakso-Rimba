@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">Tambah User</h3>
            <div class="mb-3">
                <a href="/admin" class="btn btn-success text-white shadow-none"><i class="fa-brands fa-readme"></i>&nbsp;&nbsp;Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="table-responsive">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        <i class="fa-solid fa-circle-check"></i>&nbsp;&nbsp;{{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('admin/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama :</label>
                            <input type="text" class="form-control w-100" style="border-style: groove;" name="name" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email :</label>
                            <input type="email" class="form-control w-100" name="email" style="border-style: groove;" id="email" required>
                            </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password :</label>
                            <input type="password" class="form-control w-100" name="password" style="border-style: groove;" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role :</label>
                            <select class="form-select w-100" name="role" id="role" style="border-style: groove;" aria-label="Default select example">
                                <option value="admin">Admin</option>
                                <option value="manager">Manager</option>
                                <option value="kasir">Kasir</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
