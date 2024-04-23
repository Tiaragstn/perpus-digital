@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-0 shadow-lg">
                <div class="card-header"><h3>Data Peminjaman</div></h3>
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card-body">
                        <div class="mb-4">
                        <div class="mb-4 d-flex justify-content-between">
                            <a href="{{ route('peminjaman.tambah') }}" class="btn btn-primary">
                                + Tambah Data Peminjaman
                             <a href="{{ route('print') }}" class="btn btn-primary">
                            <i class="fa fa-download"></i>Ekspor PDF</a>

                            </a>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <tr bgcolor ='grey' align=center> 
                                    <th class><font color ='white'="px-4 py-2">Nama Peminjam</font></th>
                                    <th class><font color ='white'="px-4 py-2">Buku yang Dipinjam</font></th>
                                    <th class><font color ='white'="px-4 py-2">Tanggal Peminjaman</font></th>
                                    <th class><font color ='white'="px-4 py-2">Tanggal Pengembalian</font></th>
                                    <th class><font color ='white'="px-4 py-2">Sekarang</font></th>
                                    <th class><font color ='white'="px-4 py-2">Status</font></th>
                                    <th class><font color ='white'="px-4 py-2">Aksi</font></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($peminjaman as $p)
                                    <tr>
                                        <td class="px-4 py-2">{{ $p->user->name }}</td>
                                        <td class="px-4 py-2">{{ $p->buku->judul }}</td>
                                        <td class="px-4 py-2">{{ $p->tanggal_peminjaman }}</td>
                                        <td class="px-4 py-2">{{ $p->tanggal_pengembalian }}</td>
                                        <td>{{$p->sekarang}}</td>
                                        <td class="px-4 py-2">
                                            @if($p->status === 'Dipinjam')
                                            <span class="badge bg-warning">{{ $p->status }}</span>
                                            @elseif($p->status === 'Dikembalikan')
                                            <span class="badge bg-primary">{{ $p->status }}</span>
                                            @elseif($p->status === 'Denda')
                                            <span class="badge bg-danger">{{ $p->status }}</span>
                                            @endif
                                       </td>
                                       <td class="px-4 py-2">
                                        @if($p->status === 'Dipinjam')
                                                <form id="from_{{$p->id}}" action="{{ route('peminjaman.kembalikan', $p->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Kembalikan</button>
                                                </form>
                                        @elseif ($p->status === 'Denda')
                                                <a href="{{route('peminjaman.denda', $p->id)}}" class="btn btn-danger">
                                                        Bayar Denda
                                                </a>
                                            @else ($p->status === 'Dikembalikan')
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-2 text-center">Tidak ada data buku.</td>
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