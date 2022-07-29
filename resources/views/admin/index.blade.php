@extends('admin.master')

@section('content')
<a type="button" class="btn btn-success  ml-2" href="/produk/create">Tambahkan Data</a><br><br>
<div class="col-lg-12 grid-margin stretch-card">
  @forelse ($produk as $item)
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
            <tr>
              <td class="rounded">
                <img src="{{asset('image/'. $item->gambar)}}" alt="image" />
              </td>
              <td> {{$item->name}} </td>
              <td> {{$item->stok}} </td>
              <td>
                <form action="/produk/{{$item->id}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <a href="/produk/{{$item->id}}" class="btn btn-outline-success btn-sm">Lebih Detailnya</a>
                  <a href="/produk/{{$item->id}}/edit" class="btn btn-outline-warning btn-sm">Edit</a>
                  <input type="submit" value="Delete" class="btn btn-outline-danger btn-sm">
              </form>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    @empty
        <h1>Tidak Ada List Produk</h1>
    @endforelse
  </div>
  @endsection