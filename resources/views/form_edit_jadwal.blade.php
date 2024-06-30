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
        <div class="title">Form Edit Jadwal</div>
        <div class="content">
               <form action="{{ url('update_jadwal/'.$result->jadwal->id) }}" method="POST" id="form_karyawan">
                @csrf
                <div class="user-details">
                    <div class="input-inbox">
                        <span class="details">Tanggal</span>
                        <input type="date" name="tanggal" value="{{ old('tanggal', $result->jadwal->tanggal) }}">
                    </div>

                    <div class="input-inbox">
                        <span class="details">Pelanggan</span>
                        @if (isset($result->pelanggan) && count($result->pelanggan) > 0)
                        <select name="pelanggan">
                            <option value="{{ old('pelanggan', $result->jadwal->pelanggan->id) }}">{{ old('tanggal', $result->jadwal->pelanggan->nama) }}</option>
                            @foreach ($result->pelanggan as $p)
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
                            <option value="{{ old('progress', $result->jadwal->progress) }}">{{ old('progress', $result->jadwal->progress) }}</option>
                            <option value="belum dikerjakan">Belum Dikerjakan</option>
                            <option value="sedang dikerjakan">Sedang Dikerjakan</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>

                    <div class="input-inbox">
                        <span class="details">Waktu</span>
                        <input type="time" name="waktu" value="{{ old('waktu', $result->jadwal->waktu) }}">
                    </div>

                    <div class="input-inbox">
                        <span class="details">Tugas</span>
                        <input type="text" name="tugas" value="{{ old('tugas', $result->jadwal->tugas) }}">
                    </div>

                    <div class="input-inbox">
                        <span class="details">Karyawan 1</span>
                        @if (isset($result->karyawan) && count($result->karyawan) > 0)
                        <select name="karyawan1">
                            <option value="{{ old('karyawan1', $result->jadwal->karyawan1->id) }}">{{ old('karyawan1', $result->jadwal->karyawan1->nama) }}</option>
                            <option value="">---Pilih Karyawan---</option>
                            @foreach ($result->karyawan as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                        @else
                        <a href="/form_input_user">Tambahkan Karyawan</a>
                        @endif
                    </div>

                    <div class="input-inbox">
                        <span class="details">Karyawan 2</span>
                        @if (isset($result->karyawan) && count($result->karyawan) > 0)
                        <select name="karyawan2">
                            @if (old('karyawan2', $result->jadwal->karyawan2) != 0)
                            <option value="{{ old('karyawan2', $result->jadwal->karyawan2->id) }}">{{ old('karyawan2', $result->jadwal->karyawan2->nama) }}</option>
                            @endif
                            <option value="">---Pilih Karyawan---</option>
                            @foreach ($result->karyawan as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                        @else
                        <a href="/form_input_user">Tambahkan Karyawan</a>
                        @endif
                    </div>

                    <div class="input-inbox">
                        <span class="details">Karyawan 3</span>
                        @if (isset($result->karyawan) && count($result->karyawan) > 0)
                        <select name="karyawan3">
                            @if (old('karyawan3', $result->jadwal->karyawan3) != 0)
                            <option value="{{ old('karyawan3', $result->jadwal->karyawan3->id) }}">{{ old('karyawan3', $result->jadwal->karyawan3->nama) }}</option>
                            @endif
                            <option value="">---Pilih Karyawan---</option>
                            @foreach ($result->karyawan as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                        @else
                        <a href="/form_input_user">Tambahkan Karyawan</a>
                        @endif
                    </div>


                    <div class="input-inbox">
                        <span class="details">Karyawan 4</span>
                        @if (isset($result->karyawan) && count($result->karyawan) > 0)
                        <select name="karyawan4">
                            @if (old('karyawan4', $result->jadwal->karyawan4) != 0)
                            <option value="{{ old('karyawan4', $result->jadwal->karyawan4->id) }}">{{ old('karyawan4', $result->jadwal->karyawan4->nama) }}</option>
                            @endif
                            <option value="">---Pilih Karyawan---</option>
                            @foreach ($result->karyawan as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                        @else
                        <a href="/form_input_user">Tambahkan Karyawan</a>
                        @endif
                    </div>


                    <div class="input-inbox">
                        <span class="details">Karyawan 5</span>
                        @if (isset($result->karyawan) && count($result->karyawan) > 0)
                        <select name="karyawan5">
                            @if (old('karyawan5', $result->jadwal->karyawan5) != 0)
                            <option value="{{ old('karyawan5', $result->jadwal->karyawan5->id) }}">{{ old('karyawan5', $result->jadwal->karyawan5->nama) }}</option>
                            @endif
                            <option value="">---Pilih Karyawan---</option>
                            @foreach ($result->karyawan as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                        @else
                        <a href="/form_input_user">Tambahkan Karyawan</a>
                        @endif
                    </div>


                    <div class="input-inbox">
                        <span class="details">Catatan</span>
                        <input type="text" name="catatan" value="{{ old('catatan', $result->jadwal->catatan) }}">
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
