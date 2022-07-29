@extends('admin.template.master')

@section('judul')
    <h1>Form</h1>
@endsection

@section('subjudul')
    <h3>Tambahkan Produk</h3>
@endsection

@section('content')
    <form action="/produk" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambahkan Data</h4>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="name">Nama Buah</label>
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                id="name" placeholder="Nama Buah">
                            @error('name')
                                <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" value="{{ old('deskripsi') }}" name="deskripsi" id="deskripsi" rows="4"></textarea>
                            @error('deskripsi')
                                <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="gambar" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                            @error('gambar')
                                <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga (/kg)</label>
                            <input type="text" class="form-control" value="{{ old('harga') }}" name="harga"
                                id="harga" placeholder="Harga (/kg)">
                            @error('harga')
                                <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="text" class="form-control" value="{{ old('stok') }}" name="stok"
                                id="stok" placeholder="Stok">
                            @error('stok')
                                <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </form>
@endsection
