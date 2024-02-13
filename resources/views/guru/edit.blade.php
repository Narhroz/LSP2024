@extends('layout.main')

@section('content')
    <div class="container-form">
        <h2 align="center">Edit Data Guru</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="alert">{{ $error }}</p>
            @endforeach
        @endif

        <form action="/guru/update/{{ $guru->id }}" method="post">
            @csrf
            <label for="nip">NIP</label>
            <input type="text" name="nip" value="{{ $guru->nip }}" id="nip">

            <label for="nama_guru">Nama Guru</label>
            <input type="text" name="nama_guru" value="{{ $guru->nama_guru }}" id="nama_guru">

            <label>Jenis Kelamin</label>
            <input type="radio" name="jk" id="" value="L" {{ $guru->jk == 'L' ? 'checked' : '' }}>Laki-laki
            <input type="radio" name="jk" id="" value="P" {{ $guru->jk == 'P' ? 'checked' : '' }}>Peremouan

            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="" rows="5">{{ $guru->alamat }}</textarea>

            <label for="password">Password</label>
            <input type="password" name="password" value="{{ $guru->password }}" id="password">

            <button class="button-submit" type="submit">Ubah</button>
        </form>
    </div>
@endsection