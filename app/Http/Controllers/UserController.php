<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CURLFILE;

class UserController extends Controller
{
    public function input_user(Request $request)
    {
        // if (empty(session()->get('username')) || session()->get('user_type') != 'owner') {
        //     return redirect()->to('http://localhost:8010/logout');
        // }

        $nama = $request->input('nama');
        $no_telp = $request->input('no_telp');
        $nik = $request->input('nik');
        $username = $request->input('username');
        $level = $request->input('level');
        $email = $request->input('email');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');
        $foto = $request->file('foto');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/input_user',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('nama' => $nama, 'no_telp' => $no_telp, 'nik' => $nik, 'username' => $username, 'level' => $level, 'email' => $email, 'password' => $password, 'password_confirmation' => $password_confirmation, 'foto' => ($foto) ? new CURLFILE($foto->path()) : null),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Cookie: laravel_session=1s0ntCKs6nsuXaDihfe8jCC6W9JefJnQqnBoszw2'
            ),
        ));

        $response = curl_exec($curl);
        $result = json_decode($response);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($response_code == 201) {
            return redirect()->to('http://localhost:8010/getall_user');
        } else {
            print_r($response_code);
            print_r($result);
        }
    }

    public function login_user(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $level = $request->input('level');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/login_user',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('username' => $username, 'password' => $password, 'level' => $level),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $result = json_decode($response);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        // Pengecekan kondisi kode respon yang diberikan.
        if ($response_code == 200) {
            if ($level == 'karyawan') {
                request()->session()->put('level', 'karyawan');
                request()->session()->put('username', $result->user->username, 1 * 24 * 60);
                request()->session()->put('id', $result->user->id, 1 * 24 * 60);
                return redirect()->to('http://localhost:8010/get_detail_user/' . $result->user->id);
            } else {
                request()->session()->put('level', 'owner');
                request()->session()->put('username', $result->user->username, 1 * 24 * 60);
                request()->session()->put('id', $result->user->id, 1 * 24 * 60);
                return redirect()->to('http://localhost:8010/getall_user');
            }
        } else {
            // print_r($result);
            return redirect()->to('http://localhost:8010/logout');
        }
    }

    public function logout(Request $request)
    {
        session()->forget('username');
        session()->forget('level');
        session()->forget('id');
        session()->flush();
        //Setelah proses menghapus session selesai akan diarahkan ke route halaman login.
        return redirect()->to('http://localhost:8010');
    }

    public function getall_user(Request $request)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/getall_user',
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
            return view('tabel_user', compact('result'));
        } else {
            //Jika gagal di arahkan ke logout
            // return redirect()->to('http://localhost:8010/logout');
            print "error nisa, coba cek lagi. Semangat :D";
        }
    }

    public function delete_user($id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/delete_user/' . $id,
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
            return redirect()->to('http://localhost:8010/getall_user');
        } else {
            print_r($result);
        }
    }

    public function get_edit_user($id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/get_detail_user/' . $id,
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
            return view('form_edit_user', compact('result'));
        } else {
            //Jika gagal di arahkan ke logout
            // return redirect()->to('http://localhost:8010/logout');
            print "error nisa, coba cek lagi. Semangat :D";
        }
    }


    public function update_user(Request $request, $id)
    {
        // if (empty(session()->get('username') || session()->get('user_type'))) {
        //     return redirect()->to('http://localhost:8010/logout');
        // }

        $nama = $request->input('nama');
        $no_telp = $request->input('no_telp');
        $nik = $request->input('nik');
        $username = $request->input('username');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');
        $foto = $request->file('foto');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/update_user/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('nama' => $nama, 'no_telp' => $no_telp, 'nik' => $nik, 'username' => $username, 'password' => $password, 'password_confirmation' => $password_confirmation, 'foto' => ($foto) ? new CURLFILE($foto->path()) : null),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
            ),
        ));

        $response = curl_exec($curl);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($response);
        curl_close($curl);

        if ($response_code == 200) {
            return redirect()->to('http://localhost:8010/get_detail_user/' . $id);
        } else {
            print_r($result);
        }
    }

    public function get_detail_user($id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/get_detail_user/' . $id,
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
            return view('detail_user', compact('data'));
        } else {
            print_r($response_code);
            print_r($data);
        }
    }

    public function get_search_user(Request $request)
    {

        $parameter = $request->input('parameter');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:8000/api/get_search_user/' . $parameter,
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
        $result = json_decode($response);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($response_code == 200) {
            return view('tabel_user', compact('result', 'parameter'));
        } else {
            //Jika gagal di arahkan ke logout
            // return redirect()->to('http://localhost:8010/logout');
            print "error nisa, coba cek lagi. Semangat :D";
        }
    }
}
