@extends('layout')
@section('links3','active')

@section('isi')
<div class="card">
    <div class="card-body">
        <form action="{{ url('catatan') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                        <input type="text" class="form-control" name="tanggal">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Waktu</label>
                        <input type="text" class="form-label" name="waktu">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" name="lokasi">
                        @error('materi_pelajaran')
                        <div class="text-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Suhu Tubuh</label>
                        <input type="text" class="form-control" name="suhu_tubuh">
                        @error('jenis_pembelajaran')
                        <div class="text-warning">{{ $message }}</div>
                        @enderror
                    </div>
                   
                </div>
            </div>
            
            
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>
<script>
    function previewImage() {
        const image = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
