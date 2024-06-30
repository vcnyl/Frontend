<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function input_jadwal(Request $request)
    {
        // if (empty(session()->get('username')) || session()->get('user_type') != 'owner') {
        //     return redirect()->to('http://localhost:8010/logout');
        // }

        $tanggal = $request->input('tanggal');
        $pelanggan = $request->input('pelanggan');
        $waktu = $request->input('waktu');
        $progress = $request->input('progress');
        $tugas = $request->input('tugas');
        $catatan = $request->input('catatan');
        $karyawan1 = $request->input('karyawan1');
        $karyawan2 = $request->input('karyawan2');
        $karyawan3 = $request->input('karyawan3');
        $karyawan4 = $request->input('karyawan4');
        $karyawan5 = $request->input('karyawan5');

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/input_jadwal',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('tanggal' => $tanggal, 'pelanggan' => $pelanggan, 'waktu' => $waktu, 'progress' => $progress, 'tugas' => $tugas, 'catatan' => $catatan, 'karyawan1' => $karyawan1, 'karyawan2' => $karyawan2,  'karyawan3' => $karyawan3,  'karyawan4' => $karyawan4,  'karyawan5' => $karyawan5),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $result = json_decode($response);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($response_code == 200) {
            //Lalu di kirim ke view jurnal
            return redirect()->to('http://localhost:8010/getall_jadwal_bulan');
        } else {
            //Jika gagal di arahkan ke logout
            // return redirect()->to('http://localhost:8010/logout');
            print "error nisa, coba cek lagi. Semangat :D";
        }
    }


    public function getall_jadwal(Request $request)
    {
        // if (empty(session()->get('username') || session()->get('user_type'))) {
        //     return redirect()->to('http://localhost:8010/logout');
        // }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/getall_jadwal',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($response);
        curl_close($curl);

        if ($response_code == 200) {
            //Lalu di kirim ke view jurnal
            return view('p_tabel_jadwal', compact('result'));
        } else {
            //Jika gagal di arahkan ke logout
            // return redirect()->to('http://localhost:8010/logout');
            print "error nisa, coba cek lagi. Semangat :D";
        }
    }


    public function getall_jadwal_bulan(Request $request)
    {
        // if (empty(session()->get('username') || session()->get('user_type'))) {
        //     return redirect()->to('http://localhost:8010/logout');
        // }
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/getall_jadwal_bulan',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($response);
        curl_close($curl);

        if ($response_code == 200) {
            //Lalu di kirim ke view jurnal
            return view('tabel_jadwal', compact('result'));
        } else {
            //Jika gagal di arahkan ke logout
            // return redirect()->to('http://localhost:8010/logout');
            print "error nisa, coba cek lagi. Semangat :D";
        }
    }

    // public function getall_jadwal_bulan_karyawan(Request $request)
    // {
    //         $curl = curl_init();

    //         curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'http://localhost:8000/api/getall_jadwal_bulan',
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'GET',
    //         CURLOPT_HTTPHEADER => array(
    //             'Accept: application/json'
    //         ),
    //         ));

    //         $response = curl_exec($curl);
    //         $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    //         $result = json_decode($response);
    //         curl_close($curl);

    //         if($response_code == 200){
    //             return view('tabel_jadwal_karyawan', compact('result'));
    //           }else{
    //             print "error nisa, coba cek lagi. Semangat :D";
    //         }
    // }


    public function getall_form_jadwal(Request $request)
    {
        // if (empty(session()->get('username')) || session()->get('user_type') != 'owner') {
        //             return redirect()->to('http://localhost:8010/logout');
        //         }
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/getall_form_jadwal',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $data = json_decode($response);
        curl_close($curl);

        if ($response_code == 200) {
            //Lalu di kirim ke view jurnal
            return view('form_input_jadwal', compact('data'));
        } else {
            //Jika gagal di arahkan ke logout
            // return redirect()->to('http://localhost:8010/logout');
            print "error nisa, coba cek lagi. Semangat :D";
        }
    }


    public function get_edit_jadwal($id)
    {
        // if (empty(session()->get('username') || session()->get('user_type'))) {
        //     return redirect()->to('http://localhost:8010/logout');
        // }
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/get_edit_jadwal/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
            ),
        ));

        $response = curl_exec($curl);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($response);
        curl_close($curl);

        if ($response_code == 200) {
            //Lalu di kirim ke view jurnal
            return view('form_edit_jadwal', compact('result'));
        } else {
            //Jika gagal di arahkan ke logout
            // return redirect()->to('http://localhost:8010/logout');
            print "error nisa, coba cek lagi. Semangat :D";
        }
    }

    public function get_edit_progress_jadwal($id)
    {
        // if (empty(session()->get('username') || session()->get('user_type'))) {
        //     return redirect()->to('http://localhost:8010/logout');
        // }
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/get_edit_jadwal/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
            ),
        ));

        $response = curl_exec($curl);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($response);
        curl_close($curl);

        if ($response_code == 200) {
            //Lalu di kirim ke view jurnal
            return view('form_edit_progress', compact('result'));
        } else {
            //Jika gagal di arahkan ke logout
            // return redirect()->to('http://localhost:8010/logout');
            print "error nisa, coba cek lagi. Semangat :D";
        }
    }


    public function update_jadwal(Request $request, $id)
    {
        // if (empty(session()->get('username') || session()->get('user_type'))) {
        //     return redirect()->to('http://localhost:8010/logout');
        // }
        $tanggal = $request->input('tanggal');
        $pelanggan = $request->input('pelanggan');
        $waktu = $request->input('waktu');
        $progress = $request->input('progress');
        $tugas = $request->input('tugas');
        $catatan = $request->input('catatan');
        $karyawan1 = $request->input('karyawan1');
        $karyawan2 = $request->input('karyawan2');
        $karyawan3 = $request->input('karyawan3');
        $karyawan4 = $request->input('karyawan4');
        $karyawan5 = $request->input('karyawan5');;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/update_jadwal/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('tanggal' => $tanggal, 'pelanggan' => $pelanggan, 'waktu' => $waktu, 'progress' => $progress, 'tugas' => $tugas, 'catatan' => $catatan, 'karyawan1' => $karyawan1, 'karyawan2' => $karyawan2,  'karyawan3' => $karyawan3,  'karyawan4' => $karyawan4,  'karyawan5' => $karyawan5),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
            ),
        ));

        $response = curl_exec($curl);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($response);
        curl_close($curl);

        if ($response_code == 200) {
            return redirect()->to('http://localhost:8010/get_detail_jadwal/' . $id);
        } else {
            echo "response code: " . $response_code;
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }
    }


    public function delete_jadwal($id)
    {
        // if (empty(session()->get('username')) || session()->get('user_type') != 'owner') {
        //             return redirect()->to('http://localhost:8010/logout');
        //         }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/delete_jadwal/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
            ),
        ));

        $response = curl_exec($curl);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($response);
        curl_close($curl);
        if ($response_code == 200) {
            return redirect()->to('http://localhost:8010/getall_jadwal_bulan');
        } else {
            echo "response code: " . $response_code;
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }
    }

    public function get_detail_jadwal_karyawan($id)
    {
        // if (empty(session()->get('username') || session()->get('user_type'))) {
        //     return redirect()->to('http://localhost:8010/logout');
        // }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/get_detail_jadwal/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
            ),
        ));

        $response = curl_exec($curl);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $data = json_decode($response);
        curl_close($curl);

        if ($response_code == 200) {
            //Lalu di kirim ke view jurnal
            return view('detail_jadwal_karyawan', compact('data'));
        } else {
            //Jika gagal di arahkan ke logout
            // return redirect()->to('http://localhost:8010/logout');
            print "error nisa, coba cek lagi. Semangat :D";
        }
    }

    public function get_detail_jadwal($id)
    {
        // if (empty(session()->get('username') || session()->get('user_type'))) {
        //     return redirect()->to('http://localhost:8010/logout');
        // }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/get_detail_jadwal/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
            ),
        ));

        $response = curl_exec($curl);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $data = json_decode($response);
        curl_close($curl);

        if ($response_code == 200) {
            //Lalu di kirim ke view jurnal
            return view('detail_jadwal', compact('data'));
        } else {
            //Jika gagal di arahkan ke logout
            // return redirect()->to('http://localhost:8010/logout');
            print "error nisa, coba cek lagi. Semangat :D";
        }
    }

    public function delete_jadwal_pelanggan($id)
    {

        // if (empty(session()->get('username')) || session()->get('user_type') != 'owner') {
        //     return redirect()->to('http://localhost:8010/logout');
        // }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/delete_jadwal_pelanggan/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
        ));

        $response = curl_exec($curl);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($response);
        curl_close($curl);


        if ($response_code == 200) {
            if (session('username') == null) {
                return redirect()->to('http://localhost:8010/logout');
            } else {
                return redirect()->to('http://localhost:8010/get_detail_pelanggan/' . $id);
            }
        } else {
            echo "<pre>";
            print_r($result);
            echo "</pre>";

            curl_close($curl);
            echo $response;
        }
    }


    public function delete_jadwal_karyawan($id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/delete_jadwal_karyawan/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($response);
        curl_close($curl);


        if ($response_code == 200) {
            return redirect()->to('http://localhost:8010/get_detail_karyawan/' . $id);
        } else {
            echo "<pre>";
            print_r($result);
            echo "</pre>";

            curl_close($curl);
            echo $response;
        }
    }

    public function get_search_jadwal(Request $request)
    {

        $parameter = $request->input('parameter');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/get_search_jadwal/' . $parameter,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Cookie: laravel_session=EOCXnWe9jUREOPCT2MGoslSZTZj0kcdH9TlAErax'
            ),
        ));

        $response = curl_exec($curl);
        $result = json_decode($response);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($response_code == 200) {
            return view('tabel_jadwal', compact('result', 'parameter'));
        } else {
            //Jika gagal di arahkan ke logout
            print_r($result);
        }
    }
}
