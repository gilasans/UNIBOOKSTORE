@extends('master.template')
@section('navigasi')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pengdaan </li>
    </ol>
</nav>
@endsection
@section('konten')
<div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Judul Buku</th>
          <th>Stok</th>
          <th>Kategori</th>
          <th>Penerbit</th>
          <th></th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @php
            $no = 1;
        @endphp
        @foreach ($data as $item)
       
        <tr>
          <td> <strong>{{$no++}}</strong></td>
          <td>{{$item->nama_buku}}</td>
          <td>{{$item->stok}}</td>
          @if ($item->kategori->kategori == 'keilmuan')
          <td><span class="badge bg-label-primary me-1">{{$item->kategori->kategori}}</span></td>
          @elseif($item->kategori->kategori == 'bisnis')
          <td><span class="badge bg-label-danger me-1">{{$item->kategori->kategori}}</span></td>
          @else
          <td><span class="badge bg-label-warning me-1">{{$item->kategori->kategori}}</span></td>
          @endif
         
          <td>{{$item->penerbit->nama}}</td>
        
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
@endsection
