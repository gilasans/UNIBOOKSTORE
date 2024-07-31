{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('master.template')
@section('button')
<form class="col-4" action="{{ route('dashboard') }}" method="get">
    @csrf
    <div class="input-group">
        <input type="search" value="{{ old('search') }}" name="search"
            class="rounded form-control me-1" placeholder="Search...">
        <button class="rounded btn btn-success" type="submit" id="button-addon2">
            <i class="fa fa-search"></i> Cari
        </button>
    </div>
</form>
@endsection
@section('navigasi')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Buku </li>
    </ol>
</nav>

@endsection
@section('konten')
<div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Kode</th>
          <th>Nama Buku</th>
          <th>Harga</th>
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
          <td>{{$item->kode}}</td>
          <td>{{$item->nama_buku}}</td>
          <td>{{$item->harga}}</td>        
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
