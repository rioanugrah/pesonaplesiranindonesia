<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\FileUpload\InputFile;

class TelegramController extends Controller
{
    public function sendMesssage()
    {
        $response = Telegram::sendMessage([
                        'chat_id' => env('TELEGRAM_CHAT_ID'),
                        'text' => 'Booking Code : E-TIKET202509612'."\n".
                                  'Booking Name : Open Trip Bromo - Meeting Point Malang'."\n".
                                  'Billing Name : -'."\n".
                                  'Billing Email : -'."\n".
                                  'Total : Rp. 350.000'."\n".
                                  'Status : Pending'."\n".
                                  'Tanggal Order : -'
                    ]);
        // $messageId = $response->getMessageId();
        return $response;
    }

    public function sendPhoto()
    {
        $response = Telegram::sendPhoto([
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'photo' => new InputFile('https://wisatasekolah.com/wp-content/uploads/2024/01/Jeep-Bromo.png'),
            'caption' => 'Some caption'
        ]);

        $messageId = $response->getMessageId();

        return $messageId;
    }
}
