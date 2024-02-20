@extends('layout.main')

@section('content')
    <center>
        <b>
            <h2>LIST DATA MENGAJAR</h2>
            <a href="/mengajar/create" class="button-primary">TAMBAH DATA</a>
            @if (session('success'))
                <div class="alert alert-success"><span class="closebtn" id="closeBtn">&times;</span>{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger"><span class="closebtn" id="closeBtn">&times;</span>{{ session('error') }}</div>
            @endif
            <table class="table-data">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>GURU</th>
                        <th>MATA PELAJARAN</th>
                        <th>KELAS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mengajar as $m)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $m->guru->nama_guru }}</td>
                            <td>{{ $m->mapel->nama_mapel }}</td>
                            <td>{{ $m->kelas->kelas }} {{ $m->kelas->jurusan }} {{ $m->kelas->rombel }}</td>
                            <td style="text-align: center">
                                <a href="/mengajar/edit/{{ $m->id }}" class="button-warning">EDIT</a>
                                <a href="/mengajar/destroy/{{ $m->id }}" class="button-danger" onclick="return confirm('Yakin Ingin Hapus?')">HAPUS</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </b>
    </center>
@endsection