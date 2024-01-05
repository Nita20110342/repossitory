{{-- @foreach ($users as $id => $user)
    <tr>
        <td>{{ $user['name'] }}</td>
        <td>{{ $user['email'] }}</td>
        <td>{{ $user['password'] }}</td>
        <td>
            <a href="{{ url('/users/' . $id . '/edit') }}" class="btn btn-warning">Edit</a>
            <form action="{{ url('/users/' . $id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
@endforeach --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Konfirmasi Hapus Pengguna</h1>
                <p>Anda yakin ingin menghapus pengguna ini?</p>
                <form action="{{ route('user.destory', $users['id']) }}" method="POST">
                    {{-- <form method="POST" action="{{ route('user.delete', ['id' => $userId]) }}"> --}}
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya</button>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Tidak</a>
                </form>
            </div>
        </div>
    </div>
@endsection
