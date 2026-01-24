<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsappController extends Controller
{
    function __construct(

    ){
        $this->token = env('WHATSAPP_API_KEY');
        $this->url = env('WHATSAPP_URL');
    }

    public function kirimPesan(
        $nomor,
        $pelanggan
    )
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => '08123456789|Fonnte|Admin,08123456789|Lili|User',
                'message' => 'test message to {name} as {var1}',
                // 'url' => 'https://md.fonnte.com/images/wa-logo.png',
                // 'filename' => 'filename',
                // 'schedule' => 0,
                'typing' => false,
                'delay' => '5',
                'countryCode' => '62',
                // 'file' => new CURLFile("localfile.jpg"),
                // 'location' => '-7.983908, 112.621391',
                // 'followup' => 0,
                // 'inboxid' => 0,
                'duration' => 1,
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization' => $this->token
            ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        if (isset($error_msg)) {
            return $error_msg;
        }

        return $response;
    }
}
