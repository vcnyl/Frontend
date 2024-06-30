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
                    <div class="logo">Wuznet Scheduler</div>
                </div>
                <div class="col-md-1 col-6">
                </div>
            </div>
        </div>
    </header>


    <div class="container_form">
        {{-- @if (session('user_type') == $result->username )
        <div class="title">Form Edit Data Saya</div>
        @else --}}
        <div class="title">Form Edit Data Owner & Karyawan</div>
        {{-- @endif --}}
        <div class="content">
            <form action="{{ url('update_user/'.$result->id) }}" method="POST" id="form_karyawan" enctype="multipart/form-data">
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
                        <span class="details">NIK</span>
                        <input type="text" name="nik" value="{{ old('nik', $result->nik) }}">
                    </div>

                    <div class="input-inbox">
                        <span class="details">Username</span>
                        <input type="text" name="username" value="{{ old('username', $result->username) }}">
                    </div>

                    <div class="input-inbox">
                        <span class="details">Password</span>
                        <input type="password" name="password">
                    </div>

                    <div class="input-inbox">
                        <span class="details">Ulangi Password</span>
                        <input type="password" name="password_confirmation">
                    </div>

                    <div class="input-doc">
                        <div class="row">

                            <div class="left-content">Foto<br>
                                <input type="file" name="foto">
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