@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">Hasil Laporan Transaksi</h3>

            <form>
                <label class="form-label">Filter Data</label>
                <div class="mb-3">
                    <input type="text" class="form-control pencarian" name="pencarian" placeholder="Pencarian" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-secondary text-white shadow-none" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;&nbsp; Cari &nbsp;&nbsp;</button>
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
            <h3 class="box-title">Tabel Laporan</h3>
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
                            <th class="border-top-0">Nama Pelanggan</th>
                            <th class="border-top-0">Nama Menu</th>
                            <th class="border-top-0">Jumlah</th>
                            <th class="border-top-0">Total Harga</th>
                            <th class="border-top-0">Nama Pegawai</th>
                            <th class="border-top-0">Tanggal Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($laporan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_pelanggan }}</td>
                                <td>{{ $item->nama_menu }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>Rp {{ number_format($item->total_harga) }}</td>
                                <td>{{ $item->nama_pegawai }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
