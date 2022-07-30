@extends('admin.template.master')

@section('content')
    @php
    function rupiah($angka)
    {
        $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }
    @endphp
    <a type="button" class="btn btn-success  ml-2" href="/dashboard/create">Tambahkan Data</a><br><br>
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Produk</h4>
                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> Gambar </th>
                            <th> Nama </th>
                            <th> Stok </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produk as $item)
                            <tr>
                                <td class="rounded">
                                    @if (file_exists(public_path('image' . '/' . $item->gambar)))
                                        <img src="/image/{{ $item->gambar }}">
                                    @else
                                        <img src="{{ $item->gambar }}">
                                    @endif
                                    {{-- <img src="{{ $item->gambar }}" alt="image" /> --}}
                                </td>
                                <td> {{ $item->nama }} </td>
                                <td> {{ $item->deskripsi }} </td>
                                <td> {{ $item->stok }} </td>
                                <td> {{ rupiah($item->harga) }} </td>
                                <td> {{ $item->kategori_id }} </td>
                                <td>
                                    <form action="/dashboard/{{ $item->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="/dashboard/{{ $item->id }}"
                                            class="btn btn-outline-success btn-sm">Lebih
                                            Detailnya</a>
                                        <a href="/dashboard/{{ $item->id }}/edit"
                                            class="btn btn-outline-warning btn-sm">Edit</a>
                                        <input type="submit" value="Delete" class="btn btn-outline-danger btn-sm">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                No Product
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $produk->links() }}
                </div>
            </div>
        </div>



    </div>
@endsection
@push('css')
    <style>
        td {
            max-width: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endpush
