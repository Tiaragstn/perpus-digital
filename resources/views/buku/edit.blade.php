@extends('layouts.master')

@section('content')

                        <form action="{{route('buku.update', $buku->id)}}" method="post">
                            @csrf
                            @method ('PATCH')
                            <div class="mb-4">
                                <label for="judul" class="form-label">Judul:</label>
                                <input type="text" name="judul" value="{{$buku->judul}}" class="form-control" required>
                            </div>

                            <div class="mb-4">
                                <label for="pengarang" class="form-label">Penulis:</label>
                                <input type="text" name="penulis" value="{{$buku->penulis}}" class="form-control" required>
                            </div>

                            <div class="mb-4">
                                <label for="penerbit" class="form-label">Penerbit:</label>
                                <input type="text" name="penerbit" value="{{$buku->penerbit}}" class="form-control" required>
                            </div>

                            <div class="mb-4">
                                <label for="tahun_terbit" class="form-label">Tahun Terbit:</label>
                                <input type="number" name="tahun_terbit" value="{{$buku->tahun_terbit}}" class="form-control" required>
                            </div>


                           
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
@endsection
