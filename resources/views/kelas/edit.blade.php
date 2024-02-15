@extends('layout.main')

@section('content')
    <div class="container-form">
        <h2 align="center">Edit Data Kelas</h2>

        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/kelas/update/{{ $kelas->id }}" method="POST">
            @csrf
            <tr>
                <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas">
                        @foreach ($tingkat_kelas as $k)
                            @if ($kelas->kelas == $k)
                                <option value="{{ $k }}">{{ $k }}</option>
                            @else
                                <option value="{{ $k }}">{{ $k }}</option>
                            @endif
                        @endforeach
                    </select>
                <label for="jurusan">Jurusan</label>
                    <select name="jurusan" id="jurusan">
                        @foreach ($jurusan as $j)
                            @if ($kelas->jurusan == $j)
                                <option value="{{ $j }}">{{ $j }}</option>
                            @else
                                <option value="{{ $j }}">{{ $j }}</option>
                            @endif
                        @endforeach
                    </select>

                <label for="rombel">Rombel</label>
                <input type="number" name="rombel" max="3" min="1" value="{{ $kelas->rombel }}" id="rombel">
                <button class="button-submit" type="submit">Ubah</button>
            </tr>
        </form>
    </div>
@endsection