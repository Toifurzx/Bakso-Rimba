@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">Manager Dashboard</h3>
            <div class="mb-3">
                <a href="manager/create" class="btn btn-success text-white shadow-none"><i class="fa-brands fa-readme"></i>&nbsp;&nbsp;Tambah Menu &nbsp;&nbsp;</a>
            </div>
            <form>
                <div class="mb-3">
                    <input type="text" class="form-control pencarian" name="pencarian" placeholder="Pencarian" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-secondary text-white shadow-none" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;&nbsp;Cari &nbsp;&nbsp;</button>
            </form>
        </div>
    </div>
</div>

@php
    echo "</br>";
@endphp

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">Tabel Menu</h3>
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
                            <th class="border-top-0">No</th>
                            <th class="border-top-0">Nama Menu</th>
                            <th class="border-top-0">Harga</th>
                            <th class="border-top-0">Deskripsi</th>
                            <th class="border-top-0">Ketersediaan</th>
                            <th class="border-top-0">Tanggal Ditambahkan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menu as $item)
                            <tr>
                                <td>{{ $item->iteration }}</td>
                                <td>{{ $item->nama_menu }}</td>
                                <td>Rp {{ $item->harga }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ number_format($item->ketersediaan) }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="manager/edit/{{ $item->id }}" class="btn btn-primary shadow-none">Edit</a>
                                    <a href="manager/delete/{{ $item->id }}" class="btn btn-danger shadow-none">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $menu->links() }}
</div>

@endsection
