<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;
use \Datetime;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        // function daysUntilBirthday($birthday) {
        //     $now = new DateTime();
        //     $birthday = DateTime::createFromFormat('Y-m-d', $birthday);
        //     $birthday->setDate($now->format('Y'), $birthday->format('m'), $birthday->format('d'));

        //     return $birthday->diff($now)->days;
        // }

        // $phones = [];

        // foreach ($clients as $client) {
        //     $daysLeft = daysUntilBirthday($client->birthday);

        //     if ($daysLeft >= 1 && $daysLeft <= 7) {
        //         $phones[] = $client->phone;
        //     }
        // }

        // return $phones;
        // return $clients;


        // $response = Http::withHeaders([
        //     'login' => 'Violetta123456',
        //     'psw' => 'VG9K!6CV-6kK3Jt',
        //     'phones' => '79519820329',
        //     'mes' => 'тест1',
        // ])->post('https://smsc.ru/sys/send.php');

        // if ($response->ok()) {
        //     $body = $response->json();
        // }



        function sendSMS($login, $psw, $phones, $mes) {
            $url = "https://smsc.ru/sys/send.php?login={$login}&psw={$psw}&phones={$phones}&mes={$mes}";
            return Http::post($url);
        }

        $login = "Violetta123456";
        $psw = "VG9K!6CV-6kK3Jt";
        $phones1 = ["79519820329","79199528228"];
        $phones = implode(', ', $phones1);
        $mes = "тест";

        sendSMS($login, $psw, $phones, $mes);

        // Http::post('https://smsc.ru/sys/send.php?login=Violetta123456&psw=VG9K!6CV-6kK3Jt&phones=79519820329&mes=тест');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->name = $request->input('name');
        $client->phone = $request->input('phone');
        $client->email = $request->input('email');
        $client->birthday = $request->input('birthday');
        $client->save();

        return response()->json([
            'message' => $client
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
