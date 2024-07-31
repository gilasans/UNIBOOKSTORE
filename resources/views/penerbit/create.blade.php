@extends('master.template')
@section('navigasi')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/penerbit') }}"> penerbit</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Penerbit</li>
    </ol>
</nav>
@endsection
@section('button')
<div class="mb-3 mt-3 ">
  <a href="{{route('penerbit')}}"><button class="btn btn-warning"><i class="fa-solid fa-arrow-left me-2"></i>Back</button></a>
</div>
@endsection
@section('konten')
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-body">
        <small class="text-danger">(*) Wajib di isi.</small>
        <form action="{{ route('penerbit.store') }}" method="post">
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
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Nama Penerbit <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input type="text" name="nama_penerbit" value="{{old('nama_penerbit')}}" class="form-control @error('nama_penerbit') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Nama Penerbit" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('nama_penerbit')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">kota <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-square"></i></span>
                <input type="text" name="kota" value="{{old('kota')}}" class="form-control @error('kota') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Kota" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('kota')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Telpon <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                <input type="number" name="telp" pattern="\(\d\d\d\d\)-\d\d\d\d\d\d\d" value="{{old('telp')}}" class="form-control @error('telp') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="telp" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('telp')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Alamat <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                <textarea type="text" name="alamat" value="{{old('alamat')}}" class="form-control @error('alamat') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Masukan Alamat" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" cols="30" rows="10"></textarea>
              </div>
              @error('alamat')
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