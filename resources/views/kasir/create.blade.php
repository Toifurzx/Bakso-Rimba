@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">Tambah Pesanan</h3>
            <div class="mb-3">
                <a href="/kasir" class="btn btn-success text-white shadow-none"><i class="fa-brands fa-readme"></i>&nbsp;&nbsp;Back</a>
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
                <form action="{{ route('kasir/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan :</label>
                            <input type="text" class="form-control w-100" style="border-style: groove;" name="nama_pelanggan" id="nama_pelanggan" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama_menu" class="form-label">Nama Menu :</label>
                            <select class="form-select w-100" style="border-style: groove;" name="nama_menu" id="nama_menu" aria-label="Default select example">
                            @foreach($menu as $item)
                                <option>
                                    <tr>{{ $item->nama_menu }}<tr>
                                </option>
                            @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah :</label>
                            <input type="text" class="form-control w-100" name="jumlah" style="border-style: groove;" id="jumlah" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
