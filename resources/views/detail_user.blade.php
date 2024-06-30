<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('detail.css')}}">
</head>

<body>
    <header class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <h1><strong>Wuznet Scheduler</strong></h1>
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
                        <div class="judul">Detail Data Owner & Karyawan</div>
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
    <div class="card-container">
            <div class="card">
              <div class="containerr">

                <div class="cardconten">
                  <div class="image-box">
                    <img src="{{ url('http://localhost:8000/get-image/' . $data->foto) }}" alt="Image">
                  </div>
                  <div class="description">
                    <p>Nama : {{ $data->nama }}</p>
                    <p>Username : {{ $data->username }}</p>
                    <p>No Telepon : {{ $data->no_telp }}</p>
                    <p>Email : {{ $data->email }}</p>
                    <p>NIK : {{ $data->nik }}</p>
                    <p>Level : {{ $data->level }}</p>
                    @if( session('level') == 'owner' || session('username') == $data->username)
                    <table>
                        <tr>
                            <td>
                                <form action="{{ url('/get_edit_user/'.$data->id) }}">
                                    @csrf
                                    <button class="btn-warning" type="submit">Perbarui</button>
                                </form>
                            </td>
                            @if(session('level')== 'owner')
                            @if ( $data->jadwal1 == null && $data->jadwal2 == null && $data->jadwal3 == null && $data->jadwal4 == null)
                            <td>
                                <form action="{{ url('/delete_user/'.$data->id) }}" method="POST" onsubmit="return konfirmasiHapus();">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-danger" type="submit">Hapus</button>
                                    </form>
                             </td>
                             @else
                             <td>
                                <form action="{{ url('/delete_jadwal_karyawan/'.$data->id) }}" method="POST" onsubmit="return konfirmasiHapusJadwalKaryawan();">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-danger" type="submit">Hapus</button>
                                    </form>
                             </td>
                             @endif
                             @endif
                        </tr>
                    </table>
                    @endif
                  </div>
                </div>

            </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('detail.js')}}"></script>

</body>

</html>
