<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    @include('partials.header')

    <div class="menu">
        <a href="/" class="active">HOME</a>
    </div>

    <div class="kiri-atas">
        <fieldset>

            <center>
                <button onclick="tampilkan_login_admin()" class="button-primary">Admin</button>
                <button onclick="tampilkan_login_guru()" class="button-primary">Guru</button>
                <button onclick="tampilkan_login_siswa()" class="button-primary">Siswa</button>
                <hr>
                PIlih login yang sesuai dengan posisi anda 
                <hr>
            </center>

            <div class="container-login" id="login_admin" style="display: none">
                <center>
                    <b>Login Admin</b>
                    <p>{{ session('error') }}</p>
                </center>
                <form action="/login_admin" method="POST">
                    @csrf
                    <table>
                        <tr>
                            <td width="25%"><strong>Kode Admin</strong></td>
                            <td width="25%" style="text-align: right">
                                <input type="text" name="kode_admin" maxlength="25" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%"><strong>Password</strong></td>
                            <td width="25%" style="text-align: right">
                                <input type="password" name="password" maxlength="10" required>
                            </td>
                        </tr>
                    </table>
                    <button class="button-submit" type="submit" name="button">Login</button>
                </form>
            </div>

            <div class="container-login" id="login_guru" style="display: none">
                <center>
                    <b>Login Guru</b>
                    <p>{{ session('error') }}</p>
                </center>

                <form action="/login_guru" method="post">
                    @csrf
                    <table>
                        <tr>
                            <td width="25%"><strong>NIP</strong></td>
                            <td width="25%" style="text-align: right">
                                <input type="text" name="nip" maxlength="25" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%"><strong>Password</strong></td>
                            <td width="25%" style="text-align: right">
                                <input type="password" name="password" maxlength="10" required>
                            </td>
                        </tr>
                    </table>
                    <button class="button-submit" type="submit" name="button">Login</button>
                </form>
            </div>

            <div class="container-login" id="login_siswa" style="display: none">
                <center>
                    <b>Login Siswa</b>
                    <p>{{ session('error') }}</p>
                </center>

                <form action="/login_siswa" method="post">
                    @csrf
                    <table>
                        <tr>
                            <td width="25%"><strong>NIS</strong></td>
                            <td width="25%" style="text-align: right">
                                <input type="text" name="nis" maxlength="25" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%"><strong>Password</strong></td>
                            <td width="25%" style="text-align: right">
                                <input type="password" name="password" maxlength="10" required>
                            </td>
                        </tr>
                    </table>
                    <button class="button-submit" type="submit" name="button">Login</button>
                </form>
            </div>
        </fieldset>
    </div>

    <div class="kanan">
        <center>
            <h1>
                SELAMAT DATANG
                <br>
                Di website penilaian SMKN 1 CIBINONG
            </h1>
        </center>
    </div>

    <div class="kiri-bawah">
        <center>
            <b>
                <p class="mar">Gallery</p>
                <div class="gallery">
                    <img src="{{ asset('assets/img/g2.jpg') }}" alt="" />
                    <div class="deskripsi">SMK BISA {{ date('Y') }}</div>
                </div>
            </b>
        </center>
    </div>

    @include('partials.footer')
</body>
<script src="assets/js/script.js"></script>
</html>