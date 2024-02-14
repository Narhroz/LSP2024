@extends('layout.main')

@section('content')
    <div class="container-form">
        <h2 align="center">Tambah Data Kelas</h2>

        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/kelas/store" method="post">
            @csrf
            <label for="kelas">Kelas</label>
            
        </form>
    </div>
@endsection