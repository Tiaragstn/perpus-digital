@extends('layouts.master')
 
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg">
                <div class="card-header"><h3>Data User</div></h3>
                    <div class="card-body">
                        <div class="mb-4">
                            <a href="{{route('users.create')}}" class="btn btn-primary">
                                + Tambah Pengguna
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="bg-primary text-white">
                                    <tr>
                                    <tr bgcolor ='grey' align=center> 
                                        <th scope><font color ='white'="col">Id</font color></th>
                                        <th scope><font color ='white'="col">Nama</font color></th>
                                        <th scope><font color ='white'="col">Email</font color></th>
                                        <th scope><font color ='white'="col">Role</font color></th>
                                        <th scope><font color ='white'="col">Aksi</font color></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $u)
                                    <tr>
                                        <td>{{ $u->id }}</td>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>
                                            @foreach ($u->roles as $role)
                                                {{ $role->name }}
                                            @endforeach
                                        </td>   
                                        <td><form action="{{ route ('users.hapus',$u->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class = "btn btn-danger">
                                            <i class=" ti ti-trash"></i>
                                            </button>
                                    
                                    
                                        </form>
                                        </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection