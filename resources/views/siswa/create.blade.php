@extends('layout.main')

@section('content')
    <div class="container-form">
        <h2 align="center">Tambah Data Siswa</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif

        <form action="/siswa/store" method="post">
            @csrf
            <label for="nis">NIS</label>
            <input type="text" name="nis" id="nis">

            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" name="nama_siswa" id="nama_siswa">

            <label for="">Jenis Kelamin</label>
            <input type="radio" name="jk" id="" value="L">Laki-Laki
            <input type="radio" name="jk" id="" value="P">Perempuan

            <label for="alamat">ALamat</label>
            <textarea name="alamat" id="alamat" rows="5"></textarea>

            <label for="kelas_id">Kelas</label>
            <select name="kelas_id" id="kelas_id">
                <option value=""></option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->jurusan }} {{ $k->rombel }}</option>
                @endforeach
            </select>

            <label for="password">Password</label>
            <input type="password" name="password" id="password">

            <button class="button-submit" type="submit">Simpan</button>
        </form>
    </div>
@endsection