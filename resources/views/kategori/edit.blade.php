@extends('layouts.master')

@section('content')
        <div class="container">
            <nav class="navbar navbar-dark bg-primary">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <b> Edit Kategori</b>
                    </a>
                </div>
            </nav>
            <br>
                    <div class="card-body">
                        <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_kategori" class="form-label">nama kategori</label>
                                <input type="text" value="{{$kategori->nama_kategori}}" name="nama_kategori" class="form-control"
                                    id="judul" aria-describedby="emailHelp">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection