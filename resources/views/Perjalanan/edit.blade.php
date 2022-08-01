@extends('layout')
@section('links3','active')

@section('container')
<div class="card">
    <div class="card-body">
        <form action="{{ url('agenda/'.$agenda->id) }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            @method("PATCH")
            <div class="form-group">
                <label>Nama Guru</label>
                <input type="text" name="nama_guru" value="{{ $agenda->nama_guru }}" class="form-control">
                @error('nama_guru')
                    <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>mapel</label>
                <input type="text" name="mata_pelajaran" value="{{ $agenda->mapel }}" class="form-control">
                @error('mapel')
                    <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Materi Pelajaran</label>
                <input type="text" name="materi_pelajaran" value="{{ $agenda->materi_pelajaran }}" class="form-control">
                @error('materi_pelajaran')
                    <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Jenis Pembelajaran</label>
                <input type="text" name="jenis_pembelajaran" value="{{ $agenda->jenis_pembelajaran }}" class="form-control">
                @error('jenis_pembelajaran')
                    <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Link Pembelajaran</label>
                <input type="url" name="link_pembelajaran" value="{{ $agenda->link_pembelajaran }}" class="form-control">
                @error('link_pembelajaran')
                    <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Absensi Siswa</label>
                <input type="number" name="absensi_siswa" value="{{ $agenda->absensi_siswa }}" class="form-control">
                @error('absensi_siswa')
                    <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Post Gambar Dokumentasi</label>
                <input type="file" class="form-control-file" id="foto" name="foto" onchange="previewImage()">
                @if ($agenda->foto)
                    <img src="{{ asset($agenda->foto) }}" class="img-preview img-fluid  col-sm-5 mt-2">
                @else
                    <img class="img-preview img-fluid  col-sm-5 mt-2">
                @endif
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Kelas</label>
                        <select name="kelas" class="form-select form-control" id="">
                            <option selected>{{ $agenda->kelas }}</option>
                            <option value="1">XI TEI</option>
                            <option value="2">XI MM 1</option>
                            <option value="3">XI MM 2</option>
                            <option value="4">XI MM 3</option>
                            <option value="5">XI BRC 1</option>
                            <option value="6">XI BRC 2</option>
                            <option value="7">XI RPL 1</option>
                            <option value="8">XI RPL 2</option>
                            <option value="9">XI TKJ 1</option>
                            <option value="10">XI TKJ 2</option>
                            <option value="11">XI TKJ 3</option>
                            <option value="12">XI TKJ 4</option>
                        </select>
                {{-- <input type="text" name="absensi_siswa" value="{{ $agenda->absensi_siswa }}" class="form-control"> --}}
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" value="{{ $agenda->keterangan }}" class="form-control">
                @error('keterangan')
                    <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Jam Mulai</label>
                <input type="datetime" name="jam_mulai" value="{{ $agenda->jam_mulai }}" class="form-control">
                @error('jam_mulai')
                    <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Jam Selesai</label>
                <input type="datetime" name="jam_selesai" value="{{ $agenda->jam_selesai }}" class="form-control">
                @error('jam_selesai')
                    <div class="text-warning">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
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