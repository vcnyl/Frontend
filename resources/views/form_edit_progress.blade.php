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
        <div class="title">Form Edit Progress Jadwal</div>
        <div class="content">
            <form action="{{ url('update_jadwal/'.$result->jadwal->id) }}" method="POST" id="form_karyawan" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="tanggal" value="{{ old('tanggal', $result->jadwal->tanggal) }}">
                <input type="hidden" name="pelanggan" value="{{ old('pelanggan', $result->jadwal->pelanggan->id) }}">
                <input type="hidden" name="waktu" value="{{ old('waktu', $result->jadwal->waktu) }}">
                <input type="hidden" name="catatan" value="{{ old('catatan', $result->jadwal->catatan) }}">
                <input type="hidden" name="tugas" value="{{ old('tugas', $result->jadwal->tugas) }}">
                <input type="hidden" name="karyawan1" value="{{ old('karyawan1', $result->jadwal->karyawan1->id) }}">
                @if($result->jadwal->karyawan2 != null)
                <input type="hidden" name="karyawan2" value="{{ old('karyawan2', $result->jadwal->karyawan2->id) }}">
                @endif
                @if($result->jadwal->karyawan3 != null)
                <input type="hidden" name="karyawan3" value="{{ old('karyawan3', $result->jadwal->karyawan3->id) }}">
                @endif
                @if($result->jadwal->karyawan4 != null)
                <input type="hidden" name="karyawan4" value="{{ old('karyawan4', $result->jadwal->karyawan4->id) }}">
                @endif
                <div class="user-details">
                    <div class="input-inbox">
                        <span class="details">Progress</span>
                        <select name="progress" onchange="handleSelectChange(this)">
                            <option value="{{ old('progreess', $result->jadwal->progress) }}">
                                {{$result->jadwal->progress}}
                            </option>
                            <option value="belum dikerjakan">belum dikerjakan</option>
                            <option value="sedang dikerjakan">sedang dikerjakan</option>
                            <option value="selesai">selesai</option>
                        </select>
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
@if(session('status_karya') == 'update_gagal')
<script>
    alert('Isi data sesuai ketentuan!');
</script>
@endif

</html>