<!DOCTYPE html>
<html>

<head>
    <title>Wuznet Scheduler</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('form.css')}}">
    <style>
    .hidden {
        display: none;
    }
    </style>
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="logo">Portofolio Mahasiswa Jurusan Bisnis dan Informatika POLIWANGI</div>
                </div>
                <div class="col-md-1 col-6">
                </div>
            </div>
        </div>
    </header>


    <div class="container_form">
        <div class="title">Form Edit Data Pelanggan</div>
        <div class="content">
            <form action="{{ url('update_pelanggan/'.$result->id) }}" method="POST" id="form_karyawan"
                enctype="multipart/form-data">
                @csrf
                <div class="user-details">
                    <div class="input-inbox">
                        <span class="details">Nama</span>
                        <input type="text" name="nama" value="{{ old('nama', $result->nama) }}">
                    </div>

                    <div class="input-inbox">
                        <span class="details">No Telepon</span>
                        <input type="text" name="no_telp" value="{{ old('no_telp', $result->no_telp) }}">
                    </div>

                    <div class="input-inbox">
                        <span class="details">Alamat</span>
                        <input type="text" name="alamat" value="{{ old('alamat', $result->alamat) }}">
                    </div>

                    <div class="input-inbox">
                        <span class="details">Link Maps</span>
                        <input type="text" name="maps" value="{{ old('maps', $result->maps) }}">
                    </div>

                    <div class="input-doc">
                        <div class="row">

                            <div class="left-content">Foto Rumah<br>
                                <input type="file" name="foto_rumah">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="button">
                    <input type="submit" name="" value="Submit">
                </div>
            </form>
        </div>
    </div>

    <!-- Include Bootstrap JS (Opsional) -->
    <script src="{{ asset('form.js')}}"></script>


</body>

</html>