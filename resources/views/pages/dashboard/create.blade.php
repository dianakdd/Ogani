@extends('layouts.dashboard')
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Product</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">Product</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="container">
                    <div class="card">
                        <div class="card-header">

                            <h5>Form Grid</h5>
                        </div>
                        <div class="card-body">

                            <form>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Product Name"
                                            name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi Product</label>
                                        <textarea class="form-control" name="deskripsi" placeholder="write Something" id="deskripsi" rows="3"></textarea>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="harga">Harga</label>
                                            <input type="number" name="harga" class="form-control" id="harga"
                                                placeholder="200000">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="stok">Stok</label>
                                            <input type="number" name="stok" class="form-control" id="stok"
                                                placeholder="100">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="stok">Stok</label>
                                        <div class="input-group cust-file-button mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn  btn-primary" type="button">Button</button>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="gambar"
                                                    id="gambar">
                                                <label class="custom-file-label" for="gambar">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck">
                                            <label class="form-check-label" for="gridCheck">Check me out</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn  btn-primary">Sign in</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="/dashboard/assets/css/plugins/dataTables.bootstrap5.min.css">
@endpush
@push('script')
    <script src="/dashboard/assets/js/jquery-3.5.1.js"></script>
    <script src="/dashboard/assets/js/jquery.dataTables.min.js"></script>
    <script src="/dashboard/assets/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
