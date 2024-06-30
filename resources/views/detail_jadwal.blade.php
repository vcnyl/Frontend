<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Jadwal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('detail.css')}}">

</head>

<body>
    <header class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <h1><strong>Wuznet Scheduler</strong></h1>
            </div>
            <div class="col-md-5 text-right">
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
                    <div class="judul">Detail Data Jadwal</div>
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
                    <img src="{{ url('http://localhost:8000/get-image/' . $data->pelanggan->foto_rumah)}}" alt="Gambar_Karya">
                  </div>
                  <div class="description">
                    <p>Tanggal : {{ $data->tanggal }}</p>
                    <p>Waktu : {{ $data->waktu }}</p>
                    <p>Progress : {{ $data->progress }}</p>
                    <p>Nama Pelanggan : {{ $data->pelanggan->nama }}</p>
                    <p>No Telp Pelanggan : {{ $data->pelanggan->no_telp }}</p>
                    <p>Alamat Pelanggan : {{ $data->pelanggan->alamat }}</p>
                   <p>Link Maps : <a href="#" onclick="openLinkMaps('{{ $data->pelanggan->maps }}'); return false;">{{ $data->pelanggan->maps }}</a></p>

                    <script>
                    function openLinkMaps(link) {
                        window.open(link.startsWith('http') ? link : 'http://' + link, '_blank');
                    }
                    </script>
                      <script>
                        function openLinkKaryawan(link) {
                            window.open(link.startsWith('http') ? link : 'http://localhost:8010/get_detail_user/' + link, '_blank');
                        }
                        </script>

                    <p>Catatan : {{ $data->catatan }}</p>
                    <p>Tugas : {{ $data->progress }}</p>
                    <p>Karyawan Bertugas : <a href="#" onclick="openLinkKaryawan('{{ $data->karyawan1->id }}'); return false;">{{ $data->karyawan1->nama }}</a>,
                        @if ($data->karyawan2 != null )
                        <a href="#" onclick="openLinkKaryawan('{{ $data->karyawan2->id }}'); return false;">{{ $data->karyawan2->nama }}</a>,
                        @endif
                        @if ($data->karyawan3 != null )
                        <a href="#" onclick="openLinkKaryawan('{{ $data->karyawan3->id }}'); return false;">{{ $data->karyawan3->nama }}</a>,
                        @endif
                        @if ($data->karyawan4 != null )
                        <a href="#" onclick="openLinkKaryawan('{{ $data->karyawan4->id }}'); return false;">{{ $data->karyawan4->nama }}</a>,
                        @endif
                        @if ($data->karyawan5 != null )
                        <a href="#" onclick="openLinkKaryawan('{{ $data->karyawan5->id }}'); return false;">{{ $data->karyawan5->nama }}</a>
                        @endif
                    </p>
                    @if (session('level') == 'owner' )
                    <table>
                        <tr>
                            <td>
                                <form action="{{ url('/get_edit_jadwal/'.$data->id) }}">
                                    @csrf
                                    <button class="btn-warning" type="submit">Perbarui</button>
                                </form>
                               </td>
                               <td>
                               <form action="{{ url('/delete_jadwal/'.$data->id) }}" method="POST" onsubmit="return konfirmasiHapus();">
                                @csrf
                                @method('DELETE')
                                <button class="btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                    @else
                    <form action="{{ url('/get_edit_progress_jadwal/'.$data->id) }}">
                        @csrf
                        <button class="btn-warning" type="submit">Update Progress</button>
                    </form>
                    @endif

                </div>
            </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('detail.js')}}"></script>

</body>

</html>
