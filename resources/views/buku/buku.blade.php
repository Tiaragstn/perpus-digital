@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-0 shadow-lg"> 
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
                                    <tr bgcolor ='grey' align=center> 
                                <th><font color ='white'>Foto Buku</font color></th>
                                    <th><font color ='white'>Judul</font color></th>
                                    <th><font color ='white'>Penulis</font color></th>
                                    <th><font color ='white'>Penerbit</font color></th>
                                    <th><font color ='white'>Tahun terbit</font color></th>
                                    <th><font color ='white'>Sinopsis</font color></th>
                                    <th><font color ='white'>Aksi</font color></th>
                                    
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
                                                <i class=" ti ti-trash"></i>
                                                    </button>
                                                    <a href="{{ route('buku.edit', $b->id) }}" class="btn btn-primary">
                                                    <i class=" ti ti-eraser"></i>  
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