@extends('starter')

@section('judul', 'Form Edit')
@section('isi')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('update-catatan',$catatan->id) }}" method="POST">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                              <input type="text" name="tanggal" value="{{ $catatan->tanggal }}" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
                              @error('catatan')
                                <div class="text-warning">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">waktu</label>
                              <input type="text" name="waktu" value="{{ $catatan->waktu }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              @error('waktu')
                                <div class="text-warning">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Lokasi</label>
                              <input type="text" name="lokasi" value="{{ $catatan->lokasi }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              @error('lokasi')
                                <div class="text-warning">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Suhu</label>
                              <input type="text" name="suhu_tubuh" value="{{ $catatan->suhu_tubuh }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              @error('suhu_tubuh')
                                <div class="text-warning">{{ $message }}</div>
                              @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection