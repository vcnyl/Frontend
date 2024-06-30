<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CURLFILE;

class PelangganController extends Controller
{
    public function input_pelanggan(Request $request)
    {
        // if (empty(session()->get('username')) || session()->get('user_type') != 'owner') {
        //     return redirect()->to('http://localhost:8010/logout');
        // }

        $nama = $request->input('nama');
        $no_telp = $request->input('no_telp');
        $alamat = $request->input('alamat');
        $maps = $request->input('maps');
        $foto_rumah = $request->file('foto_rumah');

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/input_pelanggan',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('nama' => $nama, 'no_telp' => $no_telp, 'alamat' => $alamat, 'maps' => $maps, 'foto_rumah' => ($foto_rumah) ? new CURLFILE($foto_rumah->path()) : null),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $result = json_decode($response);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($response_code == 200) {
            return redirect()->to('http://localhost:8010/getall_pelanggan');
        } else {
            echo "response code: " . $response_code;
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }
    }


    public function getall_pelanggan(Request $request)
    {
        // if (empty(session()->get('username')) || session()->get('user_type') != 'owner') {
        //     return redirect()->to('http://localhost:8010/logout');
        // }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/getall_pelanggan',
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
            return view('tabel_pelanggan', compact('result'));
        } else {
            //Jika gagal di arahkan ke logout
            // return redirect()->to('http://localhost:8010/logout');
            print "error nisa, coba cek lagi. Semangat :D";
        }
    }


    public function get_edit_pelanggan($id)
    {
        // if (empty(session()->get('username')) || session()->get('user_type') != 'owner') {
        //     return redirect()->to('http://localhost:8010/logout');
        // }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/get_detail_pelanggan/' . $id,
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
            return view('form_edit_pelanggan', compact('result'));
        } else {
            //Jika gagal di arahkan ke logout
            // return redirect()->to('http://localhost:8010/logout');
            print "error nisa, coba cek lagi. Semangat :D";
        }
    }

    public function get_detail_pelanggan($id)
    {
        // if (empty(session()->get('username') || session()->get('user_type'))) {
        //     return redirect()->to('http://localhost:8010/logout');
        // }
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/get_detail_pelanggan/' . $id,
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
            return view('detail_pelanggan', compact('data'));
        } else {
            //Jika gagal di arahkan ke logout
            // return redirect()->to('http://localhost:8010/logout');
            print "error nisa, coba cek lagi. Semangat :D";
        }
    }


    public function update_pelanggan(Request $request, $id)
    {
        // if (empty(session()->get('username') || session()->get('user_type'))) {
        //     return redirect()->to('http://localhost:8010/logout');
        // }

        $nama = $request->input('nama');
        $no_telp = $request->input('no_telp');
        $alamat = $request->input('alamat');
        $maps = $request->input('maps');
        $foto_rumah = $request->file('foto_rumah');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/update_pelanggan/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('nama' => $nama, 'no_telp' => $no_telp, 'alamat' => $alamat, 'maps' => $maps, 'foto_rumah' => ($foto_rumah) ? new CURLFILE($foto_rumah->path()) : null),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
            ),
        ));

        $response = curl_exec($curl);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($response);
        curl_close($curl);

        if ($response_code == 200) {
            return redirect()->to('http://localhost:8010/get_detail_pelanggan/' . $id);
        } else {
            echo "response code: " . $response_code;
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }
    }


    public function delete_pelanggan($id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/delete_pelanggan/' . $id,
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
            return redirect()->to('http://localhost:8010/getall_pelanggan');
        } else {
            echo "response code: " . $response_code;
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }
    }
    public function get_search_pelanggan(Request $request)
    {

        $parameter = $request->input('parameter');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/get_search_pelanggan/' . $parameter,
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
            return view('tabel_pelanggan', compact('result', 'parameter'));
        } else {
            //Jika gagal di arahkan ke logout
            print_r($result);
        }
    }
}
