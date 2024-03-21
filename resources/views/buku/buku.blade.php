@extends('layouts.master')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>List Buku</div></h3>

                    <div class="card-body">
                        <div class="mb-4">
                            <a href="{{ route('buku.create') }}" class="btn btn-primary">
                                + Tambah Data Buku
                            </a>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <tr bgcolor ='white' align=center> 
                                <th><font color ='black'>Foto Buku</font color></th>
                                    <th><font color ='blue'>Judul</font color></th>
                                    <th><font color ='black'>Penulis</font color></th>
                                    <th><font color ='black'>Penerbit</font color></th>
                                    <th><font color ='black'>Tahun terbit</font color></th>
                                    <th><font color ='black'>Sinopsis</font color></th>
                                    <th><font color ='black'>Aksi</font color></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($buku as $b)
                                    <tr>
                                    <td>
                                    <img src="{{ asset('storage/' .$b->foto) }}" alt="Foto Buku" width="100">
                                    </td>
                                        
                                        <td>{{ $b->judul }}</td>
                                        <td>{{ $b->penulis }}</td>
                                        <td>{{ $b->penerbit }}</td>
                                        <td>{{ $b->tahun_terbit }}</td>
                                        <td>{{ $b->sinopsis }}</td>
                                        <td>
                                            <form action="{{ route('buku.hapus',$b->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type ="submit" class ="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            <a class="btn btn-primary" href="{{ route('buku.edit', $b->id) }}">
                                                <i class=" fas fa-fw fa-solid fa-pen"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data buku.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection