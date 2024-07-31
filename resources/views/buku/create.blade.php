@extends('master.template')
@section('navigasi')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/buku.index') }}"> buku</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Barang</li>
    </ol>
</nav>
@endsection
@section('button')
<div class="mb-3 mt-3 ">
  <a href="{{route('buku.index')}}"><button class="btn btn-warning"><i class="fa-solid fa-arrow-left me-2"></i>Back</button></a>
</div>
@endsection
@section('konten')
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-body">
        <small class="text-danger">(*) Wajib di isi.</small>
        <form action="{{ route('buku.store') }}" enctype="multipart/form-data" method="post">
            @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Kode <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-paperclip"></i></span>
                <input type="text" name="kode" value="{{old('kode')}}" class="form-control @error('kode') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Kode Buku" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
            </div>
            @error('kode')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Nama Buku <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-book"></i></span>
                <input type="text" name="nama_buku" value="{{old('nama_buku')}}" class="form-control @error('nama_buku') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Nama Buku" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('nama_buku')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Harga Buku <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-square"></i></span>
                <input type="number" name="harga" value="{{old('harga')}}" class="form-control @error('harga') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Harga" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('harga')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Stok <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-square"></i></span>
                <input type="number" name="stok" value="{{old('stok')}}" class="form-control @error('stok') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Stok" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('stok')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Kategori <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-layer-group"></i></span>
                <select id="defaultSelect" class="form-select @error('kategori') is-invalid @enderror" name="kategori" value="{{old('kategori')}}">
                    <option hidden>Pilih Kategori Barang</option>
                    @foreach ($data as $item)
                    <option value="{{$item->id}}">{{$item->kategori}}</option>
                    @endforeach
                  </select>
              </div>
              @error('kategori')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Penerbit <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-clipboard"></i></span>
                <select id="defaultSelect" class="form-select @error('penerbit') is-invalid @enderror" name="penerbit" value="{{old('penerbit')}}">
                    <option hidden>Pilih Penerbit Buku</option>
                    @foreach ($penerbit as $png)
                    <option value="{{$png->id}}">{{$png->nama}}</option>
                    @endforeach
                  </select>
              </div>
              @error('penerbit')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane me-2"></i>Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection