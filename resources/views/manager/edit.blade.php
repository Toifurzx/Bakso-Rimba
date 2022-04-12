@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">Edit Menu</h3>
            <div class="mb-3">
                <a href="/manager" class="btn btn-success text-white shadow-none"><i class="fa-brands fa-readme"></i>&nbsp;&nbsp;Back</a>
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
                <form action="{{route('manager/update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{$edit->id}}" name="id">
                        <div class="mb-3">
                            <label for="nama_menu" class="form-label">Nama Menu :</label>
                            <input type="text" class="form-control w-100" style="border-style: groove;" name="nama_menu" id="nama_menu"  value="{{$edit->nama_menu}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga :</label>
                            <input type="number" class="form-control w-100" name="harga" style="border-style: groove;" id="harga"  value="{{$edit->harga}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi :</label>
                            <input type="text" class="form-control w-100" name="deskripsi" style="border-style: groove;" id="deskripsi"  value="{{$edit->deskripsi}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="ketersediaan" class="form-label">Ketersediaan :</label>
                            <input type="number" class="form-control w-100" name="ketersediaan" style="border-style: groove;" id="ketersediaan"  value="{{$edit->ketersediaan}}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
