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
        <div class="title">Form Input Jadwal</div>
        <div class="content">
            <form action="/input_jadwal" method="POST" id="form_jadwal" enctype="multipart/form-data">
                @csrf
                <div class="user-details">
                    <div class="input-inbox">
                        <span class="details">Tanggal</span>
                        <input type="date" name="tanggal">
                    </div>

                    <div class="input-inbox">
                        <span class="details">Pelanggan</span>
                        @if (isset($data->pelanggan) && count($data->pelanggan) > 0)
                        <select name="pelanggan">
                            <option value="">---Pilih Pelanggan---</option>
                            @foreach ($data->pelanggan as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        @else
                            <a href="/form_input_pelanggan">Tambahkan Pelanggan</a>
                            <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                            @endif
                    </div>

                    <div class="input-inbox">
                        <span class="details">Progress</span>
                        <select name="progress">
                            <option value="belum dikerjakan">Belum Dikerjakan</option>
                            <option value="sedang dikerjakan">Sedang Dikerjakan</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>

                    <div class="input-inbox">
                        <span class="details">Waktu</span>
                        <input type="time" name="waktu">
                    </div>

                    <div class="input-inbox">
                        <span class="details">Tugas</span>
                        <input type="text" name="tugas">
                    </div>

                    <div class="input-inbox">
                        <span class="details">Karyawan 1</span>
                        @if (isset($data->karyawan) && count($data->karyawan) > 0)
                        <select name="karyawan1">
                            <option value="">---Pilih Karyawan---</option>
                            @foreach ($data->karyawan as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                        @else
                        <a href="/form_input_user">Tambahkan Karyawan</a>
                        @endif
                    </div>

                    <div class="input-inbox">
                        <span class="details">Karyawan 2</span>
                        @if (isset($data->karyawan) && count($data->karyawan) > 0)
                        <select name="karyawan2">
                            <option value="">---Pilih Karyawan---</option>
                            @foreach ($data->karyawan as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                        @else
                        <a href="/form_input_user">Tambahkan Karyawan</a>
                        @endif
                    </div>

                    <div class="input-inbox">
                        <span class="details">Karyawan 3</span>
                        @if (isset($data->karyawan) && count($data->karyawan) > 0)
                        <select name="karyawan3">
                            <option value="">---Pilih Karyawan---</option>
                            @foreach ($data->karyawan as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                        @else
                        <a href="/form_input_user">Tambahkan Karyawan</a>
                        @endif
                    </div>

                    <div class="input-inbox">
                        <span class="details">Karyawan 4</span>
                        @if (isset($data->karyawan) && count($data->karyawan) > 0)
                        <select name="karyawan4">
                            <option value="">---Pilih Karyawan---</option>
                            @foreach ($data->karyawan as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                        @else
                        <a href="/form_input_user">Tambahkan Karyawan</a>
                        @endif
                    </div>

                    <div class="input-inbox">
                        <span class="details">Karyawan 5</span>
                        @if (isset($data->karyawan) && count($data->karyawan) > 0)
                        <select name="karyawan5">
                            <option value="">---Pilih Karyawan---</option>
                            @foreach ($data->karyawan as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                        @else
                        <a href="/form_input_user">Tambahkan Karyawan</a>
                        @endif
                    </div>

                    <div class="input-inbox">
                        <span class="details">Catatan</span>
                        <textarea name="catatan"></textarea>
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
