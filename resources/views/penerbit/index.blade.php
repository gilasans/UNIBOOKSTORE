@extends('master.template')
@section('navigasi')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Penerbit </li>
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
          <th>Nama Penerbit</th>
          <th>Alamat</th>
          <th>Kota</th>
          <th>Telpon</th>
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
          <td>{{$item->nama}}</td>
          <td>{{$item->alamat}}</td>        
          <td>{{$item->kota}}</td>
          <td>{{$item->telpon}}</td>
          <td class="text-end text-nowrap">
            <div class="buttons">
               
                <a href="{{ route('penerbit.edit', $item->id) }}"
                    class="btn icon btn-warning"><i class="fa-solid fa-pencil"></i></a>
                <form class="d-inline-block"
                    action="{{ route('penerbit.destroy', $item->id) }}"
                    method="get">
                    @method('DELETE')
                    @csrf
                    <button type="submit"
                        onclick="return confirm('Are you sure??')"
                    class="btn icon btn-danger"><i class="fa-solid fa-trash"></i></button>
                </form>
            </div>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
@endsection