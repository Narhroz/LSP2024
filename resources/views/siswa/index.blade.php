@extends('layout.main')

@section('content')
    <center>
        <b>
            <h2>LIST DATA SISWA</h2>
            <a href="/siswa/create" class="button-primary">TAMBAH DATA</a>
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
                        <th>NIS</th>
                        <th>NAMA SISWA</th>
                        <th>JENIS KELAMIN</th>
                        <th>ALAMAT</th>
                        <th>KELAS</th>
                        <th>PASSWORD</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->nis }}</td>
                            <td>{{ $s->nama_siswa }}</td>
                            <td>{{ $s->jk == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                            <td>{{ $s->alamat }}</td>
                            <td>{{ $s->kelas->kelas }} {{ $s->kelas->jurusan }} {{ $s->kelas->rombel }}</td>
                            <td>{{ $s->password }}</td>
                            <td style="text-align: center">
                                <a href="/siswa/edit/{{ $s->id }}" class="button-warning">EDIT</a>
                                <a href="/siswa/destroy/{{ $s->id }}" onclick="return confirm('Yakin Hapus?')" class="button-danger">HAPUS</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </b>
    </center>
@endsection