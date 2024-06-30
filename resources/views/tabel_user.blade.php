<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Web</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('tabel.css') }}">
</head>

<body>
    @csrf

    <header class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <h1><strong>Wuznet Scheduler</strong></h1>
            </div>
            <div class="col-md-4 text-right">
            </div>
            <div class="col-md-1 text-left">
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <div class="sidebar-logo" onclick="toggleSidebar()">
                    <img src="{{ asset('gambar/logo.png') }}" alt="Logo sidebar">
                </div>
            </div>
            <div class="col-md-3">
                <div class="judul">Data Owner & Karyawan</div>
            </div>
            <div class="col-md-4">
                <div class="search-box">
                    <!-- Tempatkan kotak pencarian di sini -->
                    <form action="/get_search_user" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nama/Nik/No Telepon/Username/Level"
                                name="parameter" id="searchInput">
                            <button class="btn btn-success" type="submit">Cari</button>
                        </div>
                    </form>
                    <script>
                    document.querySelector('form').addEventListener('submit', function(event) {
                        var input = document.querySelector('#searchInput');
                        input.value = encodeURIComponent(input.value);
                    });
                    </script>
                </div>
            </div>
            <div class="col-md-3 mt-2 text-right">
                <form action="/form_input_user">
                    @csrf
                    <button type="submit" class="btn-success">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>

    @if(session('level')=='owner')
    <div class="sidebar" id="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">×</a>
        {{-- <a href="/get_detail_owner/{{ session('id_owner') }}">Profile Saya</a> --}}
        <a href="/getall_jadwal_bulan">Data Jadwal</a>
        <a href="/getall_pelanggan">Data Pelanggan</a>
        <a href="/getall_user">Data Owner & Karyawan</a>
        <a href="/logout">Logout</a>
    </div>
    @else
    <div class="sidebar" id="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">×</a>
        <a href="/get_detail_user/{{ session('id') }}">Profile Saya</a>
        <a href="/getall_jadwal_bulan">Data Jadwal</a>
        <a href="/logout">Logout</a>
    </div>
    @endif

    <!-- Your content goes here -->
    <div class="scroll-wrapper">
        <div class="content-box">
            <div class="content" id="content">
                <table>
                    @csrf
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>No Telepon</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($result as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->username }}</td>
                            <td>{{ $p->no_telp }}</td>
                            <td>{{ $p->level }}</td>
                            <td>
                                <form action="{{ url('/get_detail_user/'.$p->id) }}">
                                    @csrf
                                    <button type="submit" class="btn-primary tombol">Detail</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="tabel.js"></script>
</body>

</html>