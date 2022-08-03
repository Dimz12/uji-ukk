@extends('layout')
@section('table','Data Guru')
@section('links3','active')

@section('isi')

<a href="{{ url('perjalanan/create') }}" class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus-square mr-1"></i>Add New</a>
<!-- Button trigger modal -->
<div class="card">
    <div class="card-header text-center">
        <h3>Data Perjalanan</h3>
    </div>
    <div class="card-body overflow-auto">
        <table class="table table-striped table-hover table-sm table-bordered" cell>
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2">TANGGAL</th>
                    <th rowspan="2">WAKTU</th>
                    <th rowspan="2">LOKASI</th>
                    <th rowspan="2">SUHU TUBUH</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataperjalanan as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->waktu }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>{{ $item->suhu_tubuh }}</td>
                    <td>
                        {{-- <a href="{{ url('agenda/' .$item->id). '/edit' }}"
                            class="btn btn-light text-primary border border-opacity-10 btn-sm" title="Edit Guru"><i
                                class="fas fa-edit mr-1 "></i>Edit</a>
                        <form method="POST" action="{{ url('/agenda' . '/' . $item->id) }}" accept-charset="UTF-8"
                            style="display: inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-primary btn-sm" title="Delete Guru"><i class="fas fa-trash mr-1"></i>Delete</button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->

@endsection
