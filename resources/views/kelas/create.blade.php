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
            <select name="kelas" id="kelas">
                <option value=""></option>
                @foreach ($tingkat_kelas as $k)
                    <option value="{{ $k }}">{{ $k }}</option>
                @endforeach
            </select>

            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan">
                <option value=""></option>
                @foreach ($jurusan as $j)
                    <option value="{{ $j }}">{{ $j }}</option>
                @endforeach
            </select>

            <label for="rombel">Rombel</label>
            <input type="number" name="rombel" max="4" min="1" id="rombel">

            <button class="button-submit" type="submit">Simpan</button>
        </form>
    </div>
@endsection