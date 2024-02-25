<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Events\SendApiRequest;
use Illuminate\Support\Facades\Http;
use \Datetime;
use App\Models\Client;
use App\Models\Message;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {

            $clients = Client::all();
            $messages = Message::all();
            $phones1 = [];

            function daysUntilBirthday($birthday) {
                $now = new DateTime();
                $birthday = DateTime::createFromFormat('Y-m-d', $birthday);
                $birthday->setDate($now->format('Y'), $birthday->format('m'), $birthday->format('d'));

                return $birthday->diff($now)->days;
            }

            function sendSMS($login, $psw, $phones, $mes) {
                $url = "https://smsc.ru/sys/send.php?login={$login}&psw={$psw}&phones={$phones}&mes={$mes}";
                return Http::post($url);
            }

            foreach ($clients as $client) {
                $daysLeft = daysUntilBirthday($client->birthday);

                if ($daysLeft >= 1 && $daysLeft <= 7) {
                    $phones1[] = $client->phone;
                }
            }

            $phones = implode(', ', $phones1);
            $login = env('SMS_LOGIN');
            $psw = env('SMS_PASSWORD');

            foreach ($messages as $message) {
                $mes = $message->text;
                sendSMS($login, $psw, $phones, $mes);
            }

        })->dailyAt('19:13');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
